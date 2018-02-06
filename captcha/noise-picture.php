<?php
	session_start();
	/*
	ЗАДАНИЕ 1
	- Запустите сессию
	- Создайте переменную nChars(количество выводимых на картинке символов)
		и присвойте ей произвольное значение(рекомендуемое: 5)
	- Сгенерируйте случайную строку длиной nChars символов
	- Создайте сессионную переменную randStr и присвойте ей сгенерированную строку
	*/
	
	/*
	ЗАДАНИЕ 2
	- Создайте изображение на основе файла "images/noise.jpg"
	- Создайте цвет для рисования
	- Включите сглаживание
	- Задайте начальные координаты x и y для отрисовки строки(рекомендуемые: 20 и 30)
	- Используя цикл for отрисуйте строку посимвольно
	- Для каждого символа используйте случайные значение размера и угла наклона
	- Отдайте полученный результат как jpeg-изображение с 10% сжатием
	*/
	$nChars = 5;
	
	$randStr = randomString($nChars);
	//echo $randStr;
	$_SESSION['randStr'] = $randStr;

	function randomString($count){
		$symbols = array('q','w','e','r','t','y','u','i',
					'o','p','a','s','d','f','g','h','j',
					'k','l','z','x','c','v','b','n','m',
					'1','2','3','4','5','6','7','8','9','0');

		for($i=0; $i<$count; $i++){
		$randStr .= $symbols[rand(0, count($symbols))];
		}
		return $randStr;
	}

	$img = imagecreatefromjpeg('images/noise.jpg');
	imageantialias($img,true);
	$blue = imagecolorallocate($img, 0, 0, 220);
	$x = 15;
	for($i = 0; $i<strlen($randStr);$i++){
		$size = 30;
		$size = $size + rand(-10,10);
		$grad = 0;
		$grad = rand(-25, 25);
		$x+=25; 
		$x = $x + rand(-8, 8);
		$y = 30;
		$y = $y + rand(-5, 5);
		imagefttext($img, $size, $grad, $x, $y, $blue ,"fonts/bellb.ttf", $randStr[$i]);
	
	}

	header("Content-Type: image/jpg");
	imagejpeg($img);
?>

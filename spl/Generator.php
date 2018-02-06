<?php 

function number(){
	echo "START<BR>";
	for ($i=0; $i < 5 ; $i++) { 
		$cmd = (yield $i);
		if($cmd == 'stop')
			echo $cmd."<br>";
	}
	echo "FINISH<BR>";
}
//number обьект классу генератор 
//генератор наслідується інтерфейсом ітератор і описує його за нас
$number = number(); 
foreach ($number as $value){
	if ($value == 0){
		$number->send("stop");
	}
	else{
		echo $value."<br>";
	}
}

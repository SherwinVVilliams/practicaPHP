<?php 
header("Content-type: text/html; charset = utf8");
interface MyInterface{}

class Object{}

class Counter extends Object implements MyInterface{
	const START = 0;
	private static $c = self::START;

	public function count(){
		return self::$c++;
	}
}

$class = new ReflectionClass("Counter");
printf(
	"===> %s%s%s %s '%s' [экземпляр класса %s] <br>
		обьявлен в %s <br>
		строки с %d по %d <br>",  
		$class->isInternal() ? "Встроееный" : "Пользователький",
		$class->isAbstract() ? "Абстрактный " : "",
		$class->isFinal() ? "Финальный" : "",
		$class->isInterface() ? "Интерфейс" : "Класс",
		$class->getName(),
		var_export($class->getParentClass(),1),
		$class->getFileName(), 
		$class->getStartLine(),
		$class->getEndLine()
		);

//Вывод интерфейсов которых реализует класс
printf("===> Интерфейсы <br> %s <br>", var_export($class->getInterfaces(),1));
//Вывод констант класса
printf("===> Константы %s <br>", var_export($class->getConstants(), 1));
//Выбор свойсвт класса
printf("===> Свойства %s <br> ",var_export($class->getProperties(),1));
//Выбор методов класса
printf("===> Методы %s <br> ",var_export($class->getMethods(),1));
// Если есть возможность создать экземпляр класса создаем его

if($class->isInstantiable()){
	$counter = $class->newInstance();
	echo "--->Cоздан ли экземпляр класса  ".$class->getName()." ? ";
	echo $class->isInstance($counter) ? "Да" : "Нет";

	echo "<br>--->Cоздан ли экземпляр класса Object ? ";
	echo $class->isInstance(new Object()) ? "Да": "Нет";
}

?>
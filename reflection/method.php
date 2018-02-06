<?php 
header("Content-type: text/html; charset = utf8");
echo "<pre>";
class Counter{
	private static $c = 0;

	final public static function increment(){
		return self::$c++;
	}
}

$method = new ReflectionMethod("Counter", "increment");

printf("
	===> %s%s%s%s%s%s%s метод '%s' (который являеться %s <br>
	   oбьявлен в %s <br>
	   строки с %d no %d <br> ",  
	   $method->isInternal() ? "Встроенный" : "Пользовательский",
		$method->isAbstract() ? "Абстрактный" : "",
		$method->isFinal() ? "Финальный" : "",
		$method->isPublic() ? "Public" : "",
		$method->isPrivate() ? "Private" : "",
		$method->isProtected() ? "Protected" : "",
		$method->isStatic() ? "Static" : "",
		$method->getName(),
		$method->isConstructor() ? "Конструктор" : "Обычный метод",
		$method->getFileName(),
		$method->getStartLine(),
		$method->getEndLine()
		);

//вывод статический переменных если они есть 
if($static = $method->getStaticVariables()){
	printf("===> Статическая переменная: %s <br>");
	var_export($static,1);
}
printf("===> Результат вызова: ");
$result = $method->invoke(null);
echo $result;
?>
<pre>
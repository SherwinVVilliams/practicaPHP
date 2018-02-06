<?php 
header("Content-type: text/html; charset = utf8");
function sayHello($h, $name){
	static $count = 0;
	return "<h$h>Hello $name</h$h>";
}


//обзор функции
//Reflection::export(new ReflectionFunction("sayHello"));
//exit;


$func = new ReflectionFunction("sayHello");
printf("<p>===> %s функция %s <br>
	   обьявленна в %s <br>
	   строки с %d по %d <br>",
	$func->isInternal() ? 'Internal' : 'user_undifined',
	$func->getName(),
	$func->getFileName(),
	$func->getStartLine(),
	$func->getEndLine()
	);
// static переменные 
if($static = $func->getStaticVariables()){
	printf("<p>===>Статическая переменная %s <br>", var_export($static, 1));
}

//Визов функції 
printf("<p>===> Результать вызова: <br>");
$result = $func->invoke("1","John");
echo $result;

?>
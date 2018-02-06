<?php 
header("Content-Type: text/html; charset = utf8");
echo "<pre>";
function foo1($a, $b, $c){}
function foo2(Exception $a, &$b, &$c){}
function foo3(ReflectionFunction $a, $b = 1, $c = null){}
function foo4(){}

$result = new ReflectionFunction('foo2');

echo $result;

foreach($result->getParameters() as $i=>$param){
	printf(
		"--- Параметр #%d: %s { <br> 
		     Допускать null: %s <br>
		     Передан по ссылке %s <br>
		     Обязательный? : %s }<br>",  
		     $i,  
		     $param->getName(),
		     var_export($param->allowsNull(),1),
		     var_export($param->isPassedByReference(), 1),
		     $param->isOptional() ? "Да" : "Нет"
		     );
}
echo "<pre>";
?> 
<?php 
header("Content-type: text/html; charset = utf8");
echo "<pre>";
 abstract class A{
	private $a = 1;
	public $b = 2;
	protected $c = 3;
	const NAME = 'vad';
	public static $g = 4;
	abstract function foo();
	public static function foo1(){}
	function sayHello($h, $name){
	static $count = 0;
	return "<h$h>Hello $name</h$h>";
	}
}
//Reflection::export(new ReflectionClass('A'));

Reflection::export(new ReflectionClass('Exception'));
echo "</pre>";
exit;
?>
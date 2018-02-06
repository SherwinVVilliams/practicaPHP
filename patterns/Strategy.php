<?php
interface Type{
	function doOperation($n1, $n2);
}

class Add implements Type{
 function doOperation($n1 , $n2){
 	return $n1 + $n2;
 }
}

class Substract implements Type{
	function doOperation($n1, $n2){
		return $n1-$n2;
	}
}

class Multiply implements Type{
	function doOperation($n1, $n2){
		return $n1*$n2;
	}
}

class Context{

	private $stategy;

	function __construct($type){
		switch($type){
			case "+": $this->stategy = new Add(); break;
			case "-": $this->stategy = new Substract(); break;
			case "*": $this->stategy = new Multiply(); break;
			default : return new Exception("Wrong type!");
		}
	}

	function execute($n1, $n2){
		return $this->stategy->doOperation($n1, $n2);
	}
}

$con = new Context("-");
echo $con->execute("4", "3");
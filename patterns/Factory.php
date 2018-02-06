<?php 
interface Shape{
	function draw();
}

class Rectangle implements Shape{
 function draw(){
  print(__METHOD__."\n");
 }
}

class Circle implements Shape{
 function draw(){
  print(__METHOD__."\n");
 }
}

class Line implements Shape{
 function draw(){
  print(__METHOD__."\n");
 }
}

class Factory{
	function getShape($type){
		$type = strtoupper($type);
		switch($type){
			case "R": return new Rectangle();
			case "C": return new Circle();
			case "L": return new Line();
			default : return new Exception("Wrong type!");
		}
	}
}

$f = new Factory();
$r = $f->getShape("r");
$c = $f->getShape("c");
$l = $f->getShape("l");
$x = $f->getShape("x");
$r->draw();
$l->draw();
$c->draw();

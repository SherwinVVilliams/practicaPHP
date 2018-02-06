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

abstract class ShapeDecorator implements Shape{
	protected $shapeDecorator;

	function __construct(Shape $shapeDecorator){
		$this->shapeDecorator = $shapeDecorator;
	}

	function draw(){
		$this->shapeDecorator = draw();
	}
}

class RedShapeDecorator extends ShapeDecorator{

	function __construct(Shape $shapeDecorator){
		parent::__construct($shapeDecorator);
	}

	private function setRedBorder(){
		echo "Border Color Red\n";
	}
	function draw(){
		$this->setRedBorder();
		$this->shapeDecorator->draw();
	}
}

$c = new Circle();
$rc = new RedShapeDecorator($c);
$c->draw();
$rc->draw();
<?php 
header("Content-type: text/html; charset=utf8");
class NumbersSquared implements Iterator{
	private $_obj;
	private $_cur;

	function __construct($obj){
		$this->_obj = $obj;
	}

	public function rewind(){
		$this->_cur = $this->_obj->getStart();
	}

	public function key(){
		return $this->_cur;
	}

	public function current(){
		return pow($this->_cur, 2);
	}

	public function next(){
		$this->_cur++;
	}

	public function valid(){
		return $this->_cur <= $this->_obj->getEnd();
	}
}

class NumberSquaredRoot implements Iterator{

	private $_obj;
	private $_cur;

	function __construct($obj){
		$this->_obj = $obj;
	}

	public function rewind(){
		$this->_cur = $this->_obj->getStart();
	}

	public function key(){
		return $this->_cur;
	}

	public function current(){
		return sqrt($this->_cur);
	}

	public function next(){
		$this->_cur++;
	}

	public function valid(){
		return $this->_cur <= $this->_obj->getEnd();
	}

}

class MathIterator implements IteratorAggregate{
	
	private $_start;
	private $_end;
	private $_action;

	function __construct($start, $end ,$action){
		$this->_start = $start;
		$this->_end = $end;
		$this->_action = $action;
	}

	public function getStart(){
		return $this->_start;
	}

	public function getEnd(){
		return $this->_end;
	}

	public function getIterator(){
		switch ($this->_action) {
			case 'pow':
				return new NumbersSquared($this);
				break;
			
			case 'sqrt':
				return new NumberSquaredRoot($this);
				break;
		}
	}
}

$obj = new MathIterator('2', '10', 'pow');
foreach ($obj as $key => $value) {
	print "Квадрат числа $key = $value <br>";
}
$obj1 = new MathIterator('4', '16', 'sqrt');
foreach ($obj1 as $key => $value) {
	print "Квадратный корень числа $key = $value <br>";
}
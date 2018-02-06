<?php 
class myIterator implements Iterator{

	private $var = [];

	function __construct($array){
		if(is_array($array)){
			$this->var = $array;
		}
	}

	public function rewind(){
		echo "rewinding<br>";
		reset($this->var);
	}

	public function current(){
		$var = current($this->var);
		echo "current: $var<br>";
		return $var;
	}

	public function key(){
		$var = key($this->var);
		echo "key: .".$var."<br>";
		return $var;
	}

	public function next(){
		$var = next($this->var);
		echo "next: $var<br>";
		return $var;

	}

	public function valid(){
		$var = $this->current() !== false;
		echo "valid: {$var} <br>";
		return $var;
	}
}

$var = ["vadim", "oleiinik", "grigor"];
$it = new myIterator($var);
foreach ($it as $key => $value) {
	print "key: $value<br>";
}



?>
<?php 
class myObject{
	private $_flag;

	function __construct(){
		$this->_flag = rand(0,3);
	}

	public function action(){
		echo "Done<br>";
		$ret = (bool)$this->_flag;
		$this->_flag = rand(0,3);
		return $ret;
	}
}

$object1 = new myObject();
$object2 = new myObject();
$arrayIterator = new ArrayIterator([$object1, $object2]);

$object3 = new myObject();
$object4 = new myObject();
$arrayIterator1 = new ArrayIterator([$object3, $object4]);

$arrayIter = new AppendIterator();
$arrayIter->append($arrayIterator);
$arrayIter->append($arrayIterator1);

$it = new InfiniteIterator($arrayIter);
foreach ($it as $obj) {
	$result = $obj->action();
	if(!$result)
		break;
	usleep(200);
}

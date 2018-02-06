<?php 

class Course{

	private $_name;

	function __construct($name){
		$this->_name = $name;
	}

	public function __toString(){
		return strtoupper($this->_name);
	}
}

$courses = new SplObjectStorage();

$php = new Course('php');
$ajax = new Course('ajax');
$java = new Course('java');

$courses->attach($php); // attach - добавляєм в храніліщє
$courses->attach($ajax);
$courses->attach($java);

var_dump($courses->contains($php));// contains - провіряєм чи присутнє в храніліщі
var_dump($courses->contains($ajax));
var_dump($courses->contains($java));

$courses->detach($php); // удаляєм з храніліща

$title = [];
foreach($courses as $courss){
	$title[] = (string)$courss;
}

echo join(', ', $title);// виводить значить через кому 

?>
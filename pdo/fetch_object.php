<?php 

class User{
	public $id;
	public $lastname;
	public $name;

	function __construct(){
		$this->id = 0;
		$this->lastname = "LLL";
		$this->name = "guest";
	}

	function toUpper(){
		return $this->name = strtoupper($this->name);
	}

}

	$db = new PDO("sqlite:test.db");

	$sql = "SELECT * FROM users";

	$stmt = $db->query($sql);
	//$obj = $stmt->fetchObject("User"); //виводиться після входу в конструктор
	$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, "User");
	$obj = $stmt->fetch(PDO::FETCH_ASSOC);
	var_dump($obj);// весь сенс що значення виводяться до заходу в конструктор

	echo $obj->id."<BR>";
	//echo $obj->ToUpper()."<BR>";//роскоментить якшо  $obj = $stmt->fetchObject("User"); незакомєнтірован
	echo $obj->lastname."<BR>";

?>
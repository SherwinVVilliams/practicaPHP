<?php 
header("Content-Type: text/html; charset = utf8");
	/*$db = new PDO("sqlite:test.db");
		$sql = "SELECT email FROM users ";
	foreach($con->query($sql) as $row){
		echo $row['name']."  ".$row['lastname']."<br>";
	}*/
try{
	$con = new PDO("sqlite:test.db");

	echo "Подключаемся к бд<br>";

	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	// $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
	$sql = "SELECT email FROM users ";
	foreach($con->query($sql) as $row){
		echo $row['name']."  ".$row['lastname']."<br>";
	}
}
catch(PDOException $e){
	echo $e->getMessage();

}
//$db->errorCode();
//print_r($db->errorInfo());
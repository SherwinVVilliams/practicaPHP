<?php 
	$id =1;
	$name = 'John';

	$con = new PDO("sqlite:gbook.db");

	$stn = $con->prepare("CALL getMail(?, ?, ?)");
	// PARAMETR IN
	$stn->bindParam(1, $id, PDO::PARAM_INT);
	// PARAMETR INOUT
	$stn->bindParam(2, $name, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT);
	// PARAMETR OUT
	$stn->bindParam(3, $email, PDO::PARAM_STR);

	$stn->execute();

?>
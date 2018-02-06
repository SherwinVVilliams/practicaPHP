<?php 

	$con = new PDO("sqlite:gbook.db");

	$sth = $con->query("SELECT name, email FROM users");

	$result = $sth->fetchAll(PDO::FETCH_COLUMN, 0);
	var_dump($result);
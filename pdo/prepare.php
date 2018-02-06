<?php 
	header("Content-type: text/html; charset = utf8");

	$con = new PDO("sqlite:gbook.db");

	/*$sth = $con->prepare("SELECT email, id, msg FROM users WHERE name = :name");
	$sth->execute([':name' => "ksya"]);
	$result = $sth->fetchAll(PDO::FETCH_COLUMN, 1);//"1" - номер колонки которую нужно вывести
	print_r($result);*/

	/*$id = 4 ;
	$stn = $con->prepare("SELECT name, email, msg FROM users WHERE id = :id ");
	$stn->bindParam(':id', $id, PDO::PARAM_INT);
	$stn->execute();
	$res = $stn->fetchAll(PDO::FETCH_ASSOC);
	print_r($res);*/

	$st = $con->prepare("SELECT name, email, msg, date_time FROM users");
	$st->execute();
	$st->bindColumn(1, $name);//беремо перший параметр і присваюємо його для $name
	$st->bindColumn('email', $email);// беремо параметр email і присваюємо його для $email
	$st->bindColumn('msg', $msg);
	$st->bindColumn(4, $date_time);
	while($st->fetch(PDO::FETCH_BOUND)){
		echo $name." ".$email." ".$msg." ".$date_time."<br>";
	}
	
	?>
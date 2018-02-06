<?php 
$con = new PDO("sqlite:test.db");
/*$con->exec("CREATE TABLE users
				(id PRIMARY KEY,
				name TEXT,
				lastname TEXT)");*/
//$con->exec("INSERT INTO users (name, lastname) VALUES ('vadim', 'oleinik')");
//$con->exec("UPDATE users SET lastname = 'neoleinik' where name ='vadim'");
//$name = $con->quote('Mike');
//$lastname = $con->quote("Suzer");
//$res = $con->exec("INSERT INTO users (name , lastname) VALUES ($name, $lastname); ");
//echo $res;
$sql = $con->query("SELECT * FROM users where name = 'Mike'");
$row = $sql->fetch(PDO::FETCH_NUM);
foreach ($row as $value) {
	echo $value."<br>";
}
?> 
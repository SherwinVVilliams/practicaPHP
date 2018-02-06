<?php 
include "GbookDB.php";
$gbook = new GbookDB();
header("Content-Type: text/html; charset = utf8");
if(isset($_POST['send'])){
	//echo $_POST['name'];
	//$gbook->savePost($_POST['name'], $_POST['email'] ,$_POST['msg']);
	include "savepost.inc.php";
}
if(isset($_GET['del'])){
	include "deletePost.inc.php";
}
?><!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
	<form  method="POST" action="gbook.php">
	<p>Name:</p>
	<input type = 'text' name = 'name' placeholder="Введите имя">
	<p>Email:</p>
	<input type = 'email' name = 'email' placeholder="Введите почту">
	<p>Message:</p>
	<textarea placeholder="Введите сообщени" name = 'msg' cols = '25' rows="12"></textarea>
	<br><br>
	<button type = 'submit' name = 'send'>Отправить</button>
	</body>
</html>	
<?
include "getall.inc.php";
?>
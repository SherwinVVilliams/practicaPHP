<?php 
	include "class/Favorites.video.class.php";
	$fav = new Favorites();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
	<meta charset ="utf8">
</head>
<style>
	body{
		margin: 0;
	}
	.head{
		position: fixed;
		width: 100%;
		height: 20%; 
		background: black;
		text-align: center;
		color:white;
	}
	.rec{
		text-align: center;
		position: fixed;
		margin-left: 35%;
	}
	.main{
		display: flex;
	}
	.left{
		margin-left:30px;
		margin-top: 130px;
		width: 500px; 
		height: 540px;
		color:black;
	}
	.center{
		margin-top: 130px;
		width: 500px; 
		height: 540px;
		color:black;
	}
	.right{
		margin-top: 130px;
		width: 500px; 
		height: 540px;
		color:black;
	}
	p{
		font-size:250%;
	}
</style>
<body>
<div class = 'head'>
	<p class = 'rec'>Мы рекомендуем </p>
</div>
<div class = 'main'>
	<div  class = 'left'>
	<p>Полезные сайты</p>
	<? 
	$menus = $fav->getFavorites("getMenuItems");
//	echo "<pre>";
//print_r($menus);
	//echo "</pre>";
	
	foreach($menus as $base_key => $base_value) {
			foreach($base_value as $key => $value){
 			echo "<li><a href = ' ".$value[1]." ' >.$value[0]</a><br></li>";
 		}
	}
		
	?>
	</div>
	<div class = 'center'>
	<p>Полезные статьи</p>
	<? 
	$articles = $fav->getFavorites("getArticlesItems");
	foreach($articles as $base_key => $base_value) {
			foreach($base_value as $key => $value){
 			echo "<li><a href = ' ".$value[1]." ' >.$value[0]</a><br></li>";
 		}
	}
	?>
	</div>
	<div class = 'right'>
	<p>Полезные Приложения</p>
	<? 
	$apps = $fav->getFavorites("getAppsItems");
	foreach($apps as $base_key => $base_value) {
			foreach($base_value as $key => $value){
 			echo "<li><a href = ' ".$value[1]." ' >.$value[0]</a><br></li>";
 		}
	}
	?>
	</div>
	}
</div>
</body>
</html>
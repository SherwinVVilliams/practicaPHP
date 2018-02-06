<?php
$id = abs((int)$_GET['del']);
if($id){
	$gbook->deletePost($id);
}
else{
	$errMsg = "Не Взломано";
}
?>
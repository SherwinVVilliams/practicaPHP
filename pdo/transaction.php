<?php 
$db = new PDO("sqlite:gbook.db");
try{
$db->beginTransaction();

$db->commit();
}
catch(PDOException $e){
$db->rollBack();
}
?>
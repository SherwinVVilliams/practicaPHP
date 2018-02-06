<?php 
function loadClass($file_name){
	require_once "clasess/$file_name.class.php";
}

function loadSomething($file_name){
	//
}

function loadInterface($file_name){
	require_once "interface/$file_name.interface.php";
}
//Регеструєм функцію в регістрі
spl_autoload_register('loadClass');
spl_autoload_register('loadSomething');
spl_autoload_register('loadInterface');

var_dump(spl_autoload_functions());
//Удаляєм з регістра 
spl_autoload_unregister('loadSomething');
//Регестрация статіческого метода або класса 
//spl_autoload_register(['Main', 'autoload']);
?>
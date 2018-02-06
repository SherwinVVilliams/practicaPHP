<?php 
//Варіант який був у відео уроці
class Favorites{
	private $plugins = array();

	function __construct(){
		$isExists = false;
		foreach(glob("class/*/*.class.php") as $item){
			if(is_file($item)){
				include_once($item);
				$isExists = true;
			}
		}
		if($isExists)
		{
			$this->findPlugins();
		}	
	}

	private function findPlugins(){
		foreach (get_declared_classes() as $class){
			$rc = new ReflectionClass($class);
			if($rc->implementsInterface("IPlugin")){
				$this->plugins[] = $rc;
			}
		}	
	}

	function getFavorites($methodName){
		$list = array();
		$items = array();
		foreach($this->plugins as $rc):
			if($rc->hasMethod($methodName)):
				$rm = $rc->getMethod($methodName);
			if($rm->isStatic()){
				$items = $rm->invoke(null);
			}
			else{
				$items = $rm->invoke($rc->newInstance());
			}
			$list[] = $items;
			endif;
		endforeach;
		return $list;
	}
}
?> 
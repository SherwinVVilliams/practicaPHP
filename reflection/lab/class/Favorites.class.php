<?php 
class Favorites{
	private $plugins = array();
	private $folders = array();

	function __construct(){
		foreach(new DirectoryIterator('E:\OpenServer\OSPanel\domains\practica\php\reflection\lab\class') as $dir){
			if($dir->isDir()){
				if($dir->current() != '.' and $dir->current() != '..')	//убираємо перші 2 елементи так як це . і ..
				$this->folders[] = $dir->getPathname();// добавляємо папки в массив папок 
			}
		}
		if(count($this->folders) > 0)
		{
			$this->findPlugins();
		}	
	}

	private function findPlugins(){
		foreach($this->folders as $filepath){
			foreach(new DirectoryIterator($filepath) as $file ){
					if($file != '.' and $file != '..'){
						include $file->getPathname();
						$className = substr($file, 0 , -10);//обрізаємо назву файла щоб получити назву класса
						$ref = new ReflectionClass($className);
						if($ref->implementsInterface("IPlugin")){//перевіряємо чи в классі присутній інтерфейс IPlugin
							$this->plugins[] = $className;
							//echo $file." Наследует интерфейс IPlugin<br>";
						}
						else{
							//echo $file." Не наследует интерфейс IPlugin<br>";
						}
					}
			}
		}
	}

	function getFavorites($methodName){
		$list = array();
		foreach($this->plugins as $className){
			$ref = new ReflectionMethod($className, $methodName);
			$list[] = $ref->invoke(new $className);
		}
		return $list;
	}
}
?> 
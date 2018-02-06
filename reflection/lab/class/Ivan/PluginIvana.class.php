<?php 
require_once 'E:\OpenServer\OSPanel\domains\practica\php\reflection\lab\class/IPlugin.interface.php';
class PluginIvana implements IPlugin{

	private static $links = [
	['Site1', 'www.site-1.org'],
	['Site2', 'www.site-2.org'],
	['Site3', 'www.site-3.org'],
	];

	private $articles = [
	['Article 1', 'www.site.org/index.ph?id=1'],
	['Article 2', 'www.site.org/index.ph?id=2'],
	['Article 3', 'www.site.org/index.ph?id=3'],
	['Article 4', 'www.site.org/index.ph?id=4'],
	];

	private $apps = [
	['App 1', 'www.site.org/app-1'],
	['App 2', 'www.site.org/app-2'],
	['App 3', 'www.site.org/app-3'],
	['App 4', 'www.site.org/app-4'],
	['App 5', 'www.site.org/app-5'],
	];

	public  function getMenuItems(){
		return self::$links;
	}

	public function getArticlesItems(){
		return $this->articles;
	}

	public  function getAppsItems(){
		return $this->apps;
	}

}

?>
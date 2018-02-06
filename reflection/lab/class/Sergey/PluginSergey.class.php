<?php 
require_once 'E:\OpenServer\OSPanel\domains\practica\php\reflection\lab\class/IPlugin.interface.php';
class PluginSergey implements IPlugin{

	private static $links = [
	['SergeySite1', 'www.site-1.org'],
	['SergeySite2', 'www.site-2.org'],
	['SergeySite3', 'www.site-3.org'],
	];

	private $articles = [
	['SergeyArticle 1', 'www.site.org/index.ph?id=1'],
	['SergeyArticle 2', 'www.site.org/index.ph?id=2'],
	['SergeyArticle 3', 'www.site.org/index.ph?id=3'],
	['SergeyArticle 4', 'www.site.org/index.ph?id=4'],
	];

	private $apps = [
	['SergeyApp 1', 'www.site.org/app-1'],
	['SergeyApp 2', 'www.site.org/app-2'],
	['SergeyApp 3', 'www.site.org/app-3'],
	['SergeyApp 4', 'www.site.org/app-4'],
	['SergeyApp 5', 'www.site.org/app-5'],
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
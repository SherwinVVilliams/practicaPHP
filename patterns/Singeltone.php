<?php 
// ми можемо використовувати тільки один обьєкт класу 
Class Logger{
	const LOG_NAME = 'control.log';
	static private $_instanse;

	private function __construct(){}
	private function __clone(){}

	static function getInstanse(){
		if(!self::$_instanse)
			self::$_instanse = new self;
		return self::$_instanse;
	}

	function log($msg){
		file_put_contents(self::LOG_NAME, $msg."\n", FILE_APPEND);
	}

}

	$log = Logger::getInstanse();
	$log->log("Контрольная точка на строке".__LINE__);
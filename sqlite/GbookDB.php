<?php 
interface IGbookDB{
	// результат успех\ошибка
	function savePost($name, $email, $msg);
	// Выборка записей из гостевой книги
	function getAll();
	// удаление записей
	function deletePost($id);
}
class GbookDB implements IGbookDB{
	const DB_NAME = 'gbook.db';

	public $name;
	public $email;
	public $msg;

	protected $_db;

	function __construct(){
		if(file_exists(self::DB_NAME)){
			$this->_db = new SQLite3(self::DB_NAME);
			//echo 'its working';
		}
		else{
			$this->_db = new SQLite3(self::DB_NAME);
			$this->_db->query("CREATE TABLE users 
							(id INTEGER PRIMARY KEY,
							 name TEXT, 
							 email TEXT,
							 msg TEXT,
							 date_time TEXT,
							 ip TEXT);");
					//echo "table was created";
		}
	}

	function savePost($name, $email, $msg){ 
			$date_time = date('Y-m-d h:i:s');
			$ip = $_SERVER['REMOTE_ADDR'];
			//echo "name = $name , email = $email , msg = $msg , date_time = $date_time ,  ip = $ip";

			
			try{
				$query = $this->_db->query("INSERT INTO users (name, email, msg, date_time, ip)
				 VALUES ('$name' , '$email' , '$msg' , '$date_time' , '$ip' );");
				if(!$query){
					throw new Exception('Неудается добавить данные');
				}
			}
			catch(Exception $e)
			{
				$e->getMessage();
			}
			header("Location: gbook.php");
	}
		
		

	function checkMsg($msg){
		$msg = stripcslashes($msg);
		$msg = strip_tags($msg);
		$msg = trim($msg);
		//$msg = sqlite_escape_string($msg);
		return $msg;
	}

	function getAll(){
		$query = $this->_db->query("SELECT id, name, email, msg, date_time, ip FROM users ORDER BY id DESC");
		return $query;
	}

	function deletePost($id){
		$query = $this->_db->query("DELETE FROM users WHERE id = $id");
		header("Location: gbook.php");
	}


	function __destruct(){
		unset($this->_db);
	}
}
?>
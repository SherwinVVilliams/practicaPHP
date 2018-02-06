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
			$this->_db = new PDO("sqlite:gbook.db");
			//echo 'its working';
		}
		else{
			$this->_db = new PDO("sqlite:gbook.db");
			try {
				$this->_db->beginTransaction();
			$this->_db->exec("CREATE TABLE users 
							(id INTEGER PRIMARY KEY,
							 name TEXT, 
							 email TEXT,
							 msg TEXT,
							 date_time TEXT,
							 ip TEXT);");
			$this->_db->commit();
		}
		catch(PDOException $e){
			$this->_db->rollBack();
			echo "ERROR";
			exit;
		}
					//echo "table was created";
		}
	}

	function savePost($name, $email, $msg){ 
			$date_time = date('Y-m-d h:i:s');
			$ip = $_SERVER['REMOTE_ADDR'];
			//echo "name = $name , email = $email , msg = $msg , date_time = $date_time ,  ip = $ip";

			
			try{
				$this->_db->beginTransaction();
				$name = $this->_db->quote($name);
				$email = $this->_db->quote($email);
				$msg = $this->_db->quote($msg);
				$date_time = $this->_db->quote($date_time);
				$ip = $this->_db->quote($ip);

				$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$query = $this->_db->exec("INSERT INTO users(name, email, msg, date_time, ip)
				 VALUES ($name , $email , $msg , $date_time , $ip );");
				$this->_db->commit();
				header("Location: gbook.php");
				
			}
			catch(PDOException $e)
			{
				$this->_db->rollBack();
				echo $e->getMessage();
			}
			
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
		$query = $this->_db->exec("DELETE FROM users WHERE id = $id");
		header("Location: gbook.php");
	}


	function __destruct(){
		unset($this->_db);
	}
}
?>
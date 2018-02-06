<?php 
header('Content-Type: text/html; charset=utf-8');

abstract class AUser{
	abstract function showInfo();
}

interface ISuperUser{
	function getInfo();
}

class User extends AUser{
	static $countUser;
	const INFO_TITLE = "Данные пользователя<br>";
	public $name;
	public $login;
	public $password;

	function __construct($name = '', $login = '', $password = ''){
		try{
			++self::$countUser;
			if($name == '' or $login == '' or $password =='') throw new Exception('Введенны не все данные!<br>');
				$this->name = $name;
				$this->login = $login;
				$this->password = password_hash($password, PASSWORD_DEFAULT);
			
			
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}

	public function showInfo(){
		echo "Name = ".$this->name."<br><br>";
		echo "Login = ".$this->login."<br><br>";
		echo "Password = ".password_hash($this->password, PASSWORD_DEFAULT)."<br><br>";
	}

	public function showTitle(){
		echo self::INFO_TITLE;
	}

	function __clone(){
		$this->name = 'Guest';
		$this->login = 'guest';
		$this->password = 'qwerty';
	}
}

class SuperUser extends User implements ISuperUser{
	public $role = 'admin';
	static $countSuperUser;
	function getInfo(){
		$arr = array();
		foreach($this as $k=>$v)
		{
			$arr[$k] = $v;
		}
		return $arr;
	}

	function __construct($name, $login, $password, $role){
		++self::$countSuperUser;
		parent::__construct($name,$login,$password);
		$this->role = $role;
	}

	public function showInfo(){
		parent::showInfo();
		echo 'Role = '.$this->role.'<br>';
	}
}


$user1= new User('sa', 'vencs');
$user4 = new User('kla','kkk','fff');
$superUser = new SuperUser('eavgsaen', 'bmeda', '333', 'admina');
$superUser = new SuperUser('vsaam','ksya','333','admen');
$user = new User('vsanc', 'yrazzz', '123');
checkObjeck($user);
$user2 = clone $user;
//echo user::INFO_TITLE;
//$user->showTitle();
//$user->showInfo();

//$countSuperUser = SuperUser::$countSuperUser;
//$countUser = User::$countUser - $countSuperUser;
//echo "Количество работяг = ". $countUser ."<br>".
	//"Количество супер работяг = ". $countSuperUser;
//$arr = array();
 //$arr = $superUser->getInfo();
/*foreach ($arr as $k){
	echo $k."<br>";
}*/
$o = new stdClass();
checkObjeck($o);
function checkObjeck($obj){
	if($obj instanceof User){
		echo get_class($obj);
	}
	else{
		echo 'чужой';
	}
	
}
$user->showInfo();
$user2->showInfo();
$superUser->showInfo();

?>

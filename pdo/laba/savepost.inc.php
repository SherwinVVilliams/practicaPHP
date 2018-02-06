<?php 
		$name = $gbook->checkMsg($_POST['name']);
		$email = $gbook->checkMsg($_POST['email']);
		$msg = $gbook->checkMsg($_POST['msg']);
		if(empty($name) or empty($email) or empty($msg))
		{
			$errMsg = "Заполните все поля формы";
		}
		else{
			$gbook->savePost($name,$email,$msg);
		}

	

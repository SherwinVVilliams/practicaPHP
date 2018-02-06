<?php
	$users = $gbook->getAll();
	echo "<p> Количеств пользователей ".count($users)."</p>";
	while($row = $users->fetchArray(SQLITE3_ASSOC))
		{
			$id = $row['id'];
			$name = $row['name'];
			$email = $row['email'];
			$msg  = nl2br($row['msg']);
			$date_time = $row['date_time'];
			$ip = $row['ip'];
		
			echo  
			<<<EOD
			<hr>
			<a href = "mailto:$email">$name</a> из $ip в $date_time
			<p> Написал:  $msg</p>
			<p align = "right"><a href = "gbook.php?del=$id">Удалить</a></p>
			<hr>
EOD;
		}

?>
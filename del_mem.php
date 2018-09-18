<?php
	require_once('db.php');
	
	
	if(isset($_GET['m_id'])){
		$m_id = $_GET['m_id'];
		
		if($con->query("delete FROM member where `member_id`={$m_id}")){
			header('Location: memberlist.php');
		}else{
			echo "error For delete data".$con->connect_error;
		}
	}





?>
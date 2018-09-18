<?php
	require_once('db.php');
	
	
	
	$b_id = $_GET['b_id'];
	
	if(!isset($_SESSION['bucket'])){
		$_SESSION['bucket'][]=$b_id;
	}else{
	
		if(count($_SESSION['bucket'])<3){
			if(!in_array($b_id,$_SESSION['bucket'])){
				$_SESSION['bucket'][]=$b_id;
			}
		}
	}
	
	
	header('Location: booklist.php');
	
	//pf($_SESSION['bucket']);

?>
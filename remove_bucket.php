<?php
	require_once('db.php');
	
	$id = $_GET['id'];
	
	//unset($_SESSION['bucket'][$id]);
	
	$c=0;
	for($i=0; $i<count($_SESSION['bucket']);$i++){
		if($_SESSION['bucket'][$i]!=$id){
			$_SESSION['bucket'][$c++]=$_SESSION['bucket'][$i];
			echo "same";
		}else{
			//unset($_SESSION['bucket'][$i]);
		}
	}
	unset($_SESSION['bucket'][$i-1]);
	
	//pf($_SESSION['bucket']);
	
	header('Location: issuebook.php');	
	
?>
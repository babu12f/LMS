<?php
	require_once('db.php');
	
	$b_id = null;
	$l_id = null;
	
	if(isset($_GET['b_id'])){
		$b_id = $_GET['b_id'];
	}
	
	
	if(isset($_GET['l_id'])){
		$l_id = $_GET['l_id'];
	}
	
	
	
	if(!isset($_SESSION['buy'])){
		if($b_id){
			if(array_key_exists($b_id,$_SESSION['buy']['b'])){
				$_SESSION['buy']['b'][$b_id]=$_SESSION['buy']['b'][$b_id]+1;
			}else{
				$_SESSION['buy']['b'][$b_id] = 1;
			}
		}
		if($l_id ){
			if(array_key_exists($l_id,$_SESSION['buy']['l'])){
				$_SESSION['buy']['l'][$l_id]=$_SESSION['buy']['b'][$b_id]+1;
			}else{
				$_SESSION['buy']['l'][$l_id] = 1;
			}
		}
	}else{
		if($b_id){
			if(array_key_exists($b_id,$_SESSION['buy']['b'])){
				$_SESSION['buy']['b'][$b_id]=$_SESSION['buy']['b'][$b_id]+1;
			}else{
				$_SESSION['buy']['b'][$b_id] = 1;
			}
		}
		if($l_id ){
			if(array_key_exists($l_id,$_SESSION['buy']['l'])){
				$_SESSION['buy']['l'][$l_id]=$_SESSION['buy']['b'][$b_id]+1;
			}else{
				$_SESSION['buy']['l'][$l_id] = 1;
			}
		}
	}
	
	if(isset($_GET['b_id'])){
		header('Location: buybook.php');
	}else{
		header('Location: productlist.php');
	}
	
	
	//pf($_SESSION['buy']);

?>
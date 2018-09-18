<?php
	require_once('db.php');
	
	//$id = $_GET['id'];
	
	//unset($_SESSION['buy'][$id]);
	
	$b_id = null;
	$l_id = null;
	
	if(isset($_GET['b_id'])){
		$b_id = $_GET['b_id'];
	}
	
	
	if(isset($_GET['l_id'])){
		$l_id = $_GET['l_id'];
	}
	
	
	
	if(isset($_SESSION['buy'])){
		
		if($b_id){
			if(array_key_exists($b_id,$_SESSION['buy']['b'])){
				$_SESSION['buy']['b'][$b_id]=$_SESSION['buy']['b'][$b_id]-1;
				if($_SESSION['buy']['b'][$b_id]==0){
					unset($_SESSION['buy']['b'][$b_id]);
				}
			}
			if(!count($_SESSION['buy']['b'])){
				unset($_SESSION['buy']['b']);
			}
		}
		if($l_id ){
			if(array_key_exists($l_id,$_SESSION['buy']['l'])){
				$_SESSION['buy']['l'][$l_id]=$_SESSION['buy']['b'][$l_id]-1;
				
				if($_SESSION['buy']['l'][$b_id]==0){
					unset($_SESSION['buy']['l'][$l_id]);
				}
			}
			if(!count($_SESSION['buy']['l'])){
				unset($_SESSION['buy']['l']);
			}
		}
	}
	
	
	//pf($_SESSION['buy']);

	header('Location: issuebuy.php');	
	
?>
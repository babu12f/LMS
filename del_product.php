<?php
	require_once('db.php');
	if(isset($_GET['b_id'])){
		$b_id = $_GET['b_id'];
		
		$con->query("delete FROM `libary_item` where libary_item_id={$b_id} ");
		$con->query("delete FROM `member_buy_library_item` where libary_item_id={$b_id} and `type`='other' ");
		
		header('Location: productlist.php');
		
	}




?>
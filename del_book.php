<?php
	require_once('db.php');
	if(isset($_GET['b_id'])){
		$b_id = $_GET['b_id'];
		
		$con->query("delete FROM `book_author` where book_id={$b_id} ");
		$con->query("delete FROM `member_borrow_library_item` where libary_item_id={$b_id} ");
		$con->query("delete FROM `book` where book_id={$b_id} ");
		
		header('Location: booklist.php');
		
	}




?>
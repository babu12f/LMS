<?php
	require_once('db.php');
	
	$lib_id = $_SESSION['user_id'];
	
	
	//$date = date("Y-m-d g:i:s");
	//echo $date;
	
	if(isset($_GET['b_id'])){
		$b_id = $_GET['b_id'];
		$br_id = $_GET['br_id'];
		
		$date = date("Y-m-d g:i:s");
		//echo $date;
		
		$sql_u_b = "UPDATE `library`.`member_borrow_library_item` SET 
					`receive_by` = '{$lib_id}' 
					WHERE `member_borrow_library_item`.`borrow_id` = {$br_id};";
		
		if(isset($_GET['com'])){
			$msg = $_GET['com'];
			$sql_u_b = "UPDATE `library`.`member_borrow_library_item` SET 
						`receive_by` = '{$lib_id}',
						`comment` = '{$msg}',
						`return_date` = '$date'
						WHERE `member_borrow_library_item`.`borrow_id` = {$br_id};";
		}
		$sql_r = "UPDATE `library`.`book` SET `available` = available+1 WHERE `book`.`book_id` = {$b_id}";
		$con->query($sql_r);
		$con->query($sql_u_b);
		
		header('Location: viewborrowedbooks.php');
		
	}





?>
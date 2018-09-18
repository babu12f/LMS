<?php
   session_start();
   require_once('confiq.php');
   require_once('funcation.php');
   
   date_default_timezone_set('Asia/Dhaka');
   
   $con = new mysqli( HOST, USER, PASSWORD, DB);
   $con ->set_charset('utf8');
   
   
   if( $con->connect_errno){
	   echo "Connection faild :".$con->connect_errno;
	   die();
   }
   function is_login(){
	   if(isset($_SESSION['user_name'])){
		   return true;
	   }else{
		   return false;
	   }
   }
   
   function for_admin(){
	   if(is_login()){
		   if($_SESSION['user_type'] == 1){
			   return true;
		   }else{
			   return false;
		   }
	   }
   }
   
   
?>
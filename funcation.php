<?php

	function pf($data){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
	
	function alrt_msg($data){
		$msg = "<script>";
		$msg .= "alert('$data');";
		$msg .= "</script>";
		
		echo $msg;
	}

?>
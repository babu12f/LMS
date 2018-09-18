<?php 
  require_once('db.php');
	if(isset($_GET['l_id'])){
		$rs = $_GET['l_id'];

		$lib = "delete from liberian where liberian_id='$rs'";
		$lr = $con->query($lib);
		header('Location: liberianlist.php');
	}
?>
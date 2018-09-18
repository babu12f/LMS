<?php
	require_once('db.php');
	
	if(!is_login()){
		header('Location: index.php');
	}
	
	$l_id = $_SESSION['user_id'];
	$l_t = $_SESSION['user_type'];
	
	if(isset($_POST['update'])){
		$l_n = $_POST['l_n'];
		$l_p = $_POST['l_p'];
		$l_a = $_POST['l_a'];
		$l_e = $_POST['l_e'];
		
		if( $l_p !="" ){
			$con->query("UPDATE `liberian` SET 
						`liberian_name` = '$l_n', 
						`l_password` = MD5('$l_p'), 
						`l_address` = '$l_a', 
						`l_email` = '$l_e', 
						`u_type` = '$l_t' 
						WHERE `liberian_id` = '{$l_id}' ");
			
			alrt_msg("Edit Profile Successfull!!");
			
		}
		
		//pf($_POST);
	}
	
	
	$sql = " select * from `liberian` where liberian_id='{$l_id}'";
	
	$l = $con->query($sql)->fetch_object();
	
	//pf($l);
	


?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Add Liberian</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/w3.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/style.css">

		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

	</head>

	<body>
	<?php require_once('navbar.php'); ?>
		<div class="container">
			<div class="col-md-5 col-md-offset-4" style="margin-top:40px">
				<div class="panel panel-primary">
					<div class="panel-heading"><i class="fa fa-sign-in" ></i>Edit Liberian</div>
					<div class="panel-body">          
						<table class="table table-bordered">
							<thead>
								<tr>
									<td>
										<form action="" method="post" >    
											<label>Liberian Name:</label>
											<input class="w3-input" type="text" placeholder="Liberian Name" name="l_n" value="<?php echo $l->liberian_name; ?>" >
											<label>Liberian Password:</label>
											<input class="w3-input" type="password" placeholder="Liberian Password" name="l_p" >
											<label>Liberian Address:</label>
											<input class="w3-input" type="text" placeholder="Liberian Address" name="l_a" value="<?php echo $l->l_address ; ?>" >
											<label>Liberian Email:</label>
											<input class="w3-input" type="text" placeholder="Liberian Email" name="l_e" value="<?php echo $l->l_email; ?>" >
											<button type="submit" class="btn btn-primary" style="margin-top: 10px" name="update" >Update</button>
										</form>
									</td>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>


	</body>
</html>
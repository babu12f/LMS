<?php
	require_once('db.php');
	
	if(is_login()){
		header('Location: index.php');
	}
	
	if(isset($_POST['login'])){
		$userid = $_POST['userid'];
		$password = $_POST['password'];
		
		$sql_user = "SELECT * FROM `liberian` where `l_email`='$userid' and `l_password`=MD5('{$password}') ";
		$rs_user = $con->query($sql_user);
		
		
		if($rs_user){
			$user = $rs_user->fetch_object();
			
			$_SESSION['user_name']= $user->l_email;
			$_SESSION['user_id'] = $user->liberian_id;
			$_SESSION['user_type'] = $user->u_type;
			
			header('Location: index.php');
			
		}else{
			alrt_msg("Wrong Username Or Password!!!");
		}
		
	}
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login</title>
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
					<div class="panel-heading"><i class="fa fa-sign-in" ></i>Login</div>
					<div class="panel-body">          
						<table class="table table-bordered">
							<thead>
								<tr>
									<td>
										<label>Username:</label>
											<form action="" method="post" >
											<input class="w3-input" type="text" placeholder="Username" name="userid" >
											<label>Password:</label>
											<input class="w3-input" type="password" placeholder="Enter Password" name="password" >
											<button type="submit" class="btn btn-primary" style="margin-top: 10px" name="login" >Login</button>
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
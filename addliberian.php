<?php
   require_once('db.php');
   
   if(!is_login()){
		header('Location: index.php');
	}
   
   if(isset($_POST['login']))
   {
	   $name     = $_POST['lm'];
	   $password = $_POST['lp'];
	   $address  = $_POST['la'];
	   $email    = $_POST['le'];
	   $type     = 2;
	   
	   echo $name;
	   
	   $lb = "insert into liberian(liberian_name,l_password,l_address,l_email,u_type)values('$name ',MD5('$password'),'$address','$email ',' $type')";
	   $rs = $con->query($lb);
   }



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
					<div class="panel-heading"><i class="fa fa-sign-in" ></i>Add Liberian</div>
					<div class="panel-body">          
						<table class="table table-bordered">
							<thead>
								<tr>
									<td>
										<form action="" method="post" >    
											<label>Liberian Name:</label>
											<input class="w3-input" type="text" placeholder="Liberian Name" name="lm" >
											<label>Liberian Password:</label>
											<input class="w3-input" type="password" placeholder="Liberian Password" name="lp" >
											<label>Liberian Address:</label>
											<input class="w3-input" type="text" placeholder="Liberian Address" name="la" >
											<label>Liberian Email:</label>
											<input class="w3-input" type="email" placeholder="Liberian Email" name="le" >
											<button type="submit" class="btn btn-primary" style="margin-top: 10px" name="login" >Summit</button>
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
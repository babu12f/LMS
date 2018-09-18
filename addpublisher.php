<?php
   require_once('db.php');
	
	if(!is_login()){
		header('Location: index.php');
	}
	
    if(isset($_POST['sub']))
	{
		$pname = $_POST['p_name'];
		$pubname = $_POST['pub_name'];
		$padd = $_POST['p_add'];
		$phone = $_POST['p_phone'];
		
		$sql_pub= "insert into publisher(pub_name,publication,pub_address,pub_phone)values('$pname','$pubname','$padd','$phone')";
		
		
		$rs_pub = $con->query($sql_pub);
		header('Locationn: addpublisher.php');
	}
	if(isset($_POST['add_a'])){
		
		$aname = $_POST['a_name'];
		$sql_auth = "insert into author(author_name)values('$aname')";
		$rs_aut = $con->query($sql_auth);
		
		header('Locationn: addpublisher.php');
	}
	
	$sql_pub = "SELECT * FROM `publisher` ";
	$rs_p = $con->query($sql_pub);
	
	$sql_auth = "select * FROM author";
	$rs_a = $con->query($sql_auth);
	





?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>add publisher</title>
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
			
			<div class="row">
				<div class="col-md-5 col-md-offset-1" style="margin-top:40px">
					<div class="panel panel-primary">
						<div class="panel-heading"><i class="fa fa-sign-in" ></i>Add Publisher</div>
						<div class="panel-body"> 					
							<table class="table table-bordered">
								<thead>
									<tr>
										<td>
											<form action="" method="post" >
												<label>Publisher Name:</label>
												<input class="w3-input" type="text" placeholder="Publisher Name" name="p_name" >
												<label>Publication Name:</label>
												<input class="w3-input" type="text" placeholder="Publication Name" name="pub_name" >
												<label>Publisher Address:</label>
												<input class="w3-input" type="text" placeholder="Publisher Address" name="p_add" >
												<label>Publisher Phone:</label>
												<input class="w3-input" type="number" min="1" placeholder="Publisher Phone" name="p_phone" >
												<button type="submit" class="btn btn-primary" style="margin-top: 10px" name="sub" >Add Publisher</button>
											</form>
										</td>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
				
				<div class="col-md-5 col-md-offset-1" style="margin-top:40px">
					<div class="panel panel-primary">
						<div class="panel-heading"><i class="fa fa-sign-in" ></i>Add Author</div>
						<div class="panel-body"> 					
							<table class="table table-bordered">
								<thead>
									<tr>
										<td>
											<form action="" method="post" >
												<label>Author Name:</label>
												<input class="w3-input" type="text" placeholder="Author Name" name="a_name" >
												<button type="submit" class="btn btn-primary" style="margin-top: 10px" name="add_a" >Add Author</button>
											</form>
										</td>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
				
			</div>
			
			<div class="row">
				<div class="col-md-8 " style="margin-top:40px">
					<div class="panel panel-primary">
						<div class="panel-heading"><i class="fa fa-sign-in" ></i> Publisher List</div>
						<div class="panel-body"> 					
							<table class="table table-bordered">
								<thead>
									<tr>
										<td>
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>Publisher Name</th>
														<th>Publication Name</th>
														<th>Publisher Address</th>
														<th>Publisher Phone</th>
													</tr>
													<?php while($r=$rs_p->fetch_object()): ?>
														<tr>
															<td><?php echo $r->pub_name; ?></td>
															<td><?php echo $r->publication; ?></td>
															<td><?php echo $r->pub_address; ?></td>
															<td><?php echo $r->pub_phone; ?></td>
														</tr>
													<?php endwhile; ?>
												</thead>
											</table>
	
										</td>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
				
				<div class="col-md-4 " style="margin-top:40px">
					<div class="panel panel-primary">
						<div class="panel-heading"><i class="fa fa-sign-in" ></i> Author List</div>
						<div class="panel-body"> 					
							<table class="table table-bordered">
								<thead>
									<tr>
										<td>
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>Author Name</th>
													</tr>
													<?php while($r = $rs_a->fetch_object()): ?>
														<tr>
															<td><?php echo $r->author_name; ?></td>
														</tr>
													<?php endwhile; ?>
												</thead>
											</table>
	
										</td>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
				
			</div>
		
			
		</div>


	</body>
</html>
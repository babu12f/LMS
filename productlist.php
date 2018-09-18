<?php
	require_once('db.php');
	
	if(!is_login()){
		header('Location: index.php');
	}
	
	//pf($_SESSION['bucket']);
	//session_unset($_SESSION['bucket']);
	if(isset($_POST['search'])){
		$sql_s_b = "SELECT * FROM `libary_item` ";
		
		if(isset( $_POST['i_n'] )){
			$sql_s_b .= " where `libary_item_name`  like '%{$_POST['i_n']}%' ";
		}
		if(isset( $_POST['i_c'] )){
			if(isset( $_POST['i_n'] )){
				$sql_s_b .= " and `libary_item_type` like '%{$_POST['i_c']}%' ";
			}else{
				$sql_s_b .= " where `libary_item_type`  like '%{$_POST['i_n']}%' ";
			}
		}
		//echo $sql_s_b;
		$books = $con->query($sql_s_b);
	}else{
		$sql_s_b = "SELECT * FROM `libary_item` limit 20";
		$books = $con->query($sql_s_b);
	}
	
	
	
	//get pub
	$sql_pub = "SELECT * FROM `publisher`";
	$publicatin = $con->query($sql_pub);
	
	
	//get auther
	$sql_auth = "SELECT * FROM `author`";
	$auth = $con->query($sql_auth);



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
	   <div class="col-md-12 " style="margin-top:40px">
	   <div class="panel panel-primary">
		<div class="panel-heading">Product List</div>
		  <div class="panel-body">
	<div class="table-responsive">	  
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>
		<form action="" method="post" >
          <label class="control-label col-sm-2" for="email">Product Name:</label>
          <div class="col-md-4" style="width: 80%">
           <input type="text" id="disabledTextInput" name="i_n" class="form-control">
        </div>
        </th>
        <th>
			<select class="form-control" name="i_c">
				<option selected disabled>category name</option>
				<option>Magazine</option>
				<option>CD</option>
			</select>
      </th>
        <th>
          <button type="submit" class="btn btn-warning" name="search" >search</button>
		  <a href="issuebuy.php"><button type="button" class="btn btn-inform" name="search" >Buy</button></a>
        </th>
    </thead>
	</table>
	<table class="table table-bordered">
      <tr>
        <th>Product Name</th>
        <th>Product Description</th>
        <th>Category</th>
        <th>Price</th>
        <th>Availity</th>
        <th style="text-align:center;" >Add</th>
        <th style="text-align:center;" >Action</th>
      </tr>
	  <?php 
			while($b = $books->fetch_object()): 
			
	  ?>
	  
      <tr>
        <td><?php echo $b->libary_item_name; ?></td>
        <td><?php echo $b->item_des; ?></td>
        <td><?php echo $b->libary_item_type; ?></td>
        <td><?php echo $b->price; ?></td>
        <td><?php echo $b->item_stock; ?></td>
        <td style="text-align:center;" ><a href="add_to_buy.php?l_id=<?php echo $b->libary_item_id; ?>" ><button type="button" class="btn btn-success">+</button></a></td>
        <td style="text-align:center;" >
          <a href="addproduct.php?b_id=<?php echo  $b->libary_item_id;  ?>" ><button type="button" class="btn btn-warning">Edit</button></a>
          <a  href="del_product.php?b_id=<?php echo $b->libary_item_id; ?>" ><button type="button" class="btn btn-danger" style="margin-right: 20px">Detete</button></a>
        </td>
      </tr>
	  <?php endwhile; ?>
	</table>
</div>
 </div>
</div>
</div>
</div>
</div>
</body>
</html>

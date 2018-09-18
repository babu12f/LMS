<?php 
  require_once('db.php');
  
	if(!for_admin()){
		header('Location: index.php');
	}
  
  $lib = "select * from liberian where u_type='2'";
  
  $lr = $con->query($lib);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>liberian list</title>
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
   <div class="col-md-12" style="margin-top:40px">
      <div class="panel panel-primary">
      <div class="panel-heading">Liberian List</div>
       <div class="panel-body">             
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Liberian Name</th>
        <th>Liberian Address</th>
		<th>Liberian Email</th>
		<th>Action</th>
		
      </tr>
    </thead>
    <tbody>
	<?php while($rs=$lr->fetch_object()):?>
      <tr>
        <td><?php echo $rs->liberian_name;?></td>
        <td><?php echo $rs->l_address ;?></td>
        <td><?php echo $rs->l_email ;?></td>
		<td>
            <a href="del_lib.php?l_id=<?php echo $rs->liberian_id;  ?>" ><button type="button" class="btn btn-danger" name="del">Delete</button></a>
		</td>
      </tr>
	  <?php endwhile;?>
    </tbody>
  </table>
</div>
</div>
</div>
</div>



</body>
</html>
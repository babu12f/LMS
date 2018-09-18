<?php

	require_once('db.php');
   
    $sql=" SELECT * FROM member_buy_library_item, liberian,member
			WHERE member_buy_library_item.liberian_id = liberian.liberian_id
            and member.member_id =  member_buy_library_item.member_id";
	
	$trans = $con->query($sql);
		




?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>view returned books</title>
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
      <div class="panel-heading">Borrowed Books</div>
       <div class="panel-body"> 
   <div class="table-responsive">	   
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Product TITLE</th>
        <th>Buyer </th>
        <th>DATE OF BUY</th>
		<th>QUNTITY</th>
		<th>SELLER</th>
      </tr>
    </thead>
	
    <tbody>
	
	<?php while($r = $trans->fetch_object()): ?>
		<tr>
			<td><?php echo $r->type; ?></td>
			<td> <a href="member_his.php?m_id=<?php echo $r->member_id; ?>" > <?php echo $r->first_name." ".$r->last_name; ?> </a> </td>
			<td><?php echo $r->buying_date; ?></td>
			<td><?php echo $r->quantity; ?></td>
			<td><?php echo $r->liberian_name; ?></td>
		</tr>
	<?php endwhile; ?>  
	
    </tbody>
  </table>
 </div> 
  
</div>
</div>
</div>
</div>



</body>
</html>
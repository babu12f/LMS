<?php
	require_once('db.php');
	
	if(!is_login()){
		header('Location: index.php');
	}
   
    $sql="select b.book_name, m.member_id, m.first_name, m.last_name, i.issue_date,i.due_date,i.return_date,l.liberian_name as i_n, r.liberian_name as r_n from book b,member m,liberian l, liberian r,member_borrow_library_item i where
		b.book_id = i.libary_item_id and
		m.member_id = i.member_id and 
		l.liberian_id = i.liberian_id and 
		r.liberian_id = i.receive_by 
		ORDER BY `i`.`return_date` DESC ";
	
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
        <th>BOOK TITLE</th>
        <th>BORROWER</th>
        <th>DATE BORROW</th>
		<th>DUE DATE</th>
		<th>DATE RETURNED</th>
		<th>ISSUE BY</th>
		<th>RECIEVED BY</th>
      </tr>
    </thead>
	
    <tbody>
	
	<?php while($r = $trans->fetch_object()): ?>
		<tr>
			<td><?php echo $r->book_name; ?></td>
			<td> <a href="member_his.php?m_id=<?php echo $r->member_id; ?>" > <?php echo $r->first_name." ".$r->last_name; ?> </a> </td>
			<td><?php echo $r->issue_date; ?></td>
			<td><?php echo $r->due_date; ?></td>
			<td><?php echo $r->return_date; ?></td>
			<td><?php echo $r->i_n; ?></td>
			<td><?php echo $r->r_n; ?></td>
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
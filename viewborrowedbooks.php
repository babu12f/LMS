<?php 
	require_once('db.php');
	
	if(!is_login()){
		header('Location: index.php');
	}
	
	$sql_bo_book = "select b.book_name, b.book_id, m.member_id, m.first_name, m.last_name, i.borrow_id, i.issue_date,i.due_date,i.return_date,i.receive_by
				from book b,member m,member_borrow_library_item i where
				b.book_id = i.libary_item_id and
				m.member_id = i.member_id and
				i.receive_by=0";
	
	$bo_book = $con->query($sql_bo_book);



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>view borrowed books</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	
    <script>
		function return_book(url){
			var comment = prompt("Please Enter comment", "");
			if (comment != null) {
				if(comment!=""){
					url =url + "&com="+comment;
				}
				window.location = url;
				//alert(url);
			}
		}
	</script>

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
		<th>BORROWER ID</th>
        <th>DATE BORROW</th>
		<th>DUE DATE</th>
		<th></th>
		
      </tr>
    </thead>
    <tbody>
	<?php while($r = $bo_book->fetch_object()): ?>
		<tr>
			<td><?php echo $r->book_name; ?></td>
			<td><?php echo $r->first_name." ".$r->last_name;  ?></td>
			<td><?php echo $r->member_id; ?></td>
			<td><?php echo $r->issue_date; ?></td>
			<td><?php echo $r->due_date; ?></td>
			<td><a onClick="return_book('<?php echo "return_book.php?b_id=".$r->book_id."&br_id=".$r->borrow_id; ?>')"><button type="button" class="btn btn-success">Return</button></a></td>
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
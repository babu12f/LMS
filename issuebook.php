<?php
	require_once('db.php');
	
	if(!is_login()){
		header('Location: index.php');
	}
	
	if(!isset($_SESSION['bucket'])){
		if(count($_SESSION['bucket'])<1){
			header('Location: booklist.php');
		}
	}else{
		if(count($_SESSION['bucket'])<1){
			unset( $_SESSION['bucket'] );
			header('Location: booklist.php');
		}
	}
	//unset( $_SESSION['bucket'] );
	//echo count($_SESSION['bucket']);
	//pf($_SESSION['bucket']);
	
	
	if(isset($_POST['add_borrow'])){
		extract($_POST);
		$lib_id = $_SESSION['user_id'];
		$date = strtotime($r_d) ;
		$date = date("Y-m-d g:i:s", $date);
		//echo $date;
		$i = 0;
		
		$br_book = array();
		
		for($i=0; $i<count($p_id); $i++){
			$sql_add_borrow = "INSERT INTO `library`.`member_borrow_library_item` (  `due_date`, `libary_item_id`, `member_id`, `liberian_id`) 
																	VALUES (  '$date', '$p_id[$i]', '$m_id', '$lib_id');";
			$con->query($sql_add_borrow);
			$con->query("UPDATE `library`.`book` SET `available` = available-1 WHERE `book`.`book_id` = {$p_id[$i]}");
			$br_book[] = $con->insert_id;
		}
		unset( $_SESSION['bucket'] );
		header('Location: booklist.php');
	}
	
	
	
	
	
	
	
	
	
	
	
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>issuebook</title>
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
    <div class="col-md-8 col-md-offset-2" style="margin-top:40px;" >
      <div class="panel panel-primary">
      <div class="panel-heading"><i class="fa fa-edit"></i>Panel heading</div>
        <div class="panel-body">   <!-- start-panel -->
			<table class="table table-bordered">
								<thead>
									<tr>
										<td>
            <form method="post" action=""  >

            <p>
            <label>Due Date</label>
            <input class="w3-input" type="date" name="r_d" ></p>
            <p>
            <label>Member Id</label>
            <input class="w3-input" type="number" min="1" placeholder="Enter Member Id" name="m_id" ></p>
			
               <table class="w3-table w3-striped w3-border">
					<thead>
					<tr class="w3-red">
					  <th>Book Name</th>
					  <th>Book Edition</th>
					  <th>Delete</th>
					</tr>
					</thead>
					
						<?php 
							for($i=0; $i<count($_SESSION['bucket']);$i++): 
							$sql_bd = "SELECT * FROM `book` WHERE `book_id`={$_SESSION['bucket'][$i]}";
							$b_d = $con->query($sql_bd);
							$book = $b_d->fetch_object();
						?>
								<tr>
								  <td><?php echo $book->book_name; ?></td>
								  <td><?php echo $book->book_edition; ?></td>
								  <td><a href="remove_bucket.php?id=<?php echo $book->book_id; ?>" ><button type="button" class="btn btn-danger" name="search" >-</button></a></td>
									<input type="hidden" name="p_id[]" value="<?php echo $book->book_id;  ?>" >
								</tr>
								
					<?php  endfor; ?>
				</table>
            <button type="submit" class="btn btn-primary" name="add_borrow" >Submit TO Database</button>
            </form>
          </div>
		  </td>
									</tr>
								</thead>
							</table>
        </div> <!-- end-panel -->
      </div>
    </div>
  </div>

</body>
</html>
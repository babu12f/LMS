<?php
	require_once('db.php');
	
	if(!is_login()){
		header('Location: index.php');
	}
	
	if(!isset($_SESSION['buy'])){
		if(count($_SESSION['buy'])<1){
			header('Location: buybook.php');
		}
	}else{
		if(count($_SESSION['buy'])<1){
			unset( $_SESSION['buy'] );
			header('Location: buybook.php');
		}
	}
	//unset( $_SESSION['buy'] );
	//echo count($_SESSION['buy']);
	//pf($_SESSION['buy']);
	
	
	if(isset($_POST['add_buy'])){
		extract($_POST);
		$lib_id = $_SESSION['user_id'];
		$date = strtotime($r_d) ;
		$date = date("Y-m-d g:i:s");
		//echo $date;
		$i = 0;
		
		$br_book = array();
		
		if(isset($_POST['b_id'])){
			for($i=0; $i<count($b_id); $i++){
				
				$sql_add_buy_book = "INSERT INTO `member_buy_library_item` 
									( `member_id`, `libary_item_id`, `quantity`, `buying_date`, `liberian_id`, `type`) 
							VALUES ( '$m_id', '{$_POST['b_id'][$i]}', '{$_POST['b_q'][$i]}', '$date', '$lib_id', 'book')";
				
				$con->query($sql_add_buy_book);
			}
		}
		if(isset($_POST['l_id'])){
			for($i=0; $i<count($l_id); $i++){
				$sql_add_buy_book = "INSERT INTO `member_buy_library_item` 
									( `member_id`, `libary_item_id`, `quantity`, `buying_date`, `liberian_id`, `type`) 
							VALUES ( '$m_id', '{$_POST['l_id'][$i]}', '{$_POST['l_q'][$i]}', '$date', '$lib_id', 'other')";
				
				$con->query($sql_add_buy_book);
			}
		}
		unset( $_SESSION['buy'] );
		header('Location: buybook.php');
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
      <div class="panel-heading"><i class="fa fa-edit"></i>Issue Buy</div>
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
					  <th>Prosuct Name</th>
					  <th>Product Price</th>
					  <th>Qun</th>
					  <th>Total</th>
					  <th>Delete</th>
					</tr>
					</thead>
					
						<?php
							if(isset($_SESSION['buy']['b'])):
								foreach($_SESSION['buy']['b'] as $key => $value): 
									$sql_bd = "SELECT * FROM `book` WHERE `book_id`={$key}";
									$b_d = $con->query($sql_bd);
									$book = $b_d->fetch_object();
									//pf($key);
						?>
									<tr>
									  <td><?php echo $book->book_name; ?></td>
									  
									  <td><?php echo $book->book_price; ?></td>
									  <td><?php echo $value; ?></td>
									  <td><?php echo $value*$book->book_price; ?></td>
									  <td><a href="remove_buy.php?b_id=<?php echo $book->book_id; ?>" ><button type="button" class="btn btn-danger" name="search" >-</button></a></td>
										<input type="hidden" name="b_id[]" value="<?php echo $book->book_id;  ?>" >
										<input type="hidden" name="b_q[]" value="<?php echo $value;  ?>" >
									</tr>
									
						<?php  
								endforeach; 
							endif;
						?>
						
						<?php
							if(isset($_SESSION['buy']['l'])):
								foreach($_SESSION['buy']['l'] as $key => $value): 
									$sql_bd = "SELECT * FROM `libary_item` WHERE `libary_item_id`={$key}";
									$b_d = $con->query($sql_bd);
									$book = $b_d->fetch_object();
						?>
									<tr>
									  <td><?php echo $book->libary_item_name; ?></td>
									  <td><?php echo $book->price; ?></td>
									  <td><?php echo $value; ?></td>
									  <td><?php echo $value*$book->price; ?></td>
									  <td><a href="remove_buy.php?l_id=<?php echo $book->libary_item_id; ?>" ><button type="button" class="btn btn-danger" name="search" >-</button></a></td>
										<input type="hidden" name="l_id[]" value="<?php echo $book->libary_item_id;  ?>" >
										<input type="hidden" name="l_q[]" value="<?php echo $value;  ?>" >
									</tr>
									
						<?php  
								endforeach; 
							endif;
						?>
				</table>
            <button type="submit" class="btn btn-primary" name="add_buy" >Submit TO Database</button>
            </form>
			</td>
									</tr>
								</thead>
							</table>
          </div>
        </div> <!-- end-panel -->
      </div>
    </div>
  </div>

</body>
</html>
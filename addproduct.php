<?php
	require_once('db.php');
	
	if(!is_login()){
		header('Location: index.php');
	}
	
	$bn = "";
	$bc = "";
	$bp = "";
	$be = "";
	$bav = "";
	$isb = "";
	$pr = "";
	
	if(isset($_GET['b_id'])){
		$b_id = $_GET['b_id'];
		
		$sql_e_b = "select * from `libary_item` where libary_item_id={$b_id}";
		$rs = $con->query($sql_e_b);
		
		$book = $rs->fetch_object();
		
		$bn = $book->libary_item_name;
		$bc = $book->libary_item_type;
		$be = $book->price;
		$bav = $book->item_des;
		$isb = $book->item_stock;
		
	} 
	
	//add book
	if(isset($_POST['addBook']))
	{
		extract($_POST);
		pf($_POST);
		

		$sql = "INSERT INTO `library`.`libary_item` ( `libary_item_name`, `libary_item_type`, `price`, `item_des`, `item_stock` ) 
											VALUES ( '$productName', '$productCategory', '$price', '$productDes', '$productAv' )";


		$rs = $con->query($sql);
		//$book_id = $con->insert_id;


		if($rs)
		{
			echo "success";
		}
		else
		{
			echo "faild";
		}
	 
	}
	
	if(isset($_POST['update_b'])){
		
		extract($_POST);
		pf($_POST);
		$b_id = $_GET['b_id'];
		
		$sql = "UPDATE `library`.`libary_item` set 
						`libary_item_name`='$productName', 
						`libary_item_type`='$productCategory', 
						`price`='$price', 
						`item_des`='$productDes', 
						`item_stock` = '$productAv'
						where libary_item_id ='{$b_id}'";
				
				
		$rs_u_b = $con->query($sql);
		
		header('Location: productlist.php');
		
	}
	
	//get publication
	
	$sql_pub = "SELECT * FROM `publisher`";
	$publicatin = $con->query($sql_pub);
	
	
	//get auther
	$sql_auth = "SELECT * FROM `author`";
	$auth = $con->query($sql_auth);



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Product</title>
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
    <div class="col-md-8 col-md-offset-2" style="margin-top:40px">
	<div class="panel panel-primary">
      <div class="panel-heading">Add Product</div>
       <div class="panel-body">
			<table class="table table-bordered">
							<thead>
								<tr>
									<td>
      <form class="w7-container" method="post" action="">

      <p>
      <label>Product Name</label>
      <input class="w3-input" type="text" name="productName" placeholder="Product Name" value="<?php echo $bn; ?>" ></p>
	<p>
		<label>Product Category</label>
		<select class="form-control" name="productCategory">
			<option <?php if($bc=="magazine"){echo "selected"; } ?> >magazine</option>
			<option <?php if($bc=="cd"){echo "selected"; } ?> >cd</option>
		</select>
	</p>
       
       <p>
      <label>Product Description</label>
      <input class="w3-input" type="text" name="productDes" placeholder="Product Description" value="<?php echo $bav; ?>" ></p>
      <p>
	  
      <label>Product Available</label>
	  <input class="w3-input" type="number" name="productAv" placeholder="amount" min="0" value="<?php echo $isb; ?>"></p>
      <p>
      <label>Price</label>
      <input class="w3-input" type="number" name="price" min="1" placeholder="Price" value="<?php echo $be; ?>">
      </p>
	  
	  <?php if(isset($_GET['b_id'])): ?>
		  
		  <button type="submit" class="btn btn-primary" name="update_b">Update Book</button>
		  <?php else: ?>
          <button type="submit" class="btn btn-primary" name="addBook">Submit</button>

		<?php endif; ?>




      </form>
	  </div>
	  </td>
								</tr>
							</thead>
						</table>
    </div>
    </div>
</div>

</body>
</html>
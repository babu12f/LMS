<?php
	require_once('db.php');
	
	if(!is_login()){
		header('Location: index.php');
	}
	
	$bn = "";
	$bc = "";
	$ba = array();
	$bp = "";
	$be = "";
	$bav = "";
	$isb = "";
	$pr = "";
	
	if(isset($_GET['b_id'])){
		$b_id = $_GET['b_id'];
		
		$sql_e_b = "select * from book where book_id={$b_id}";
		$rs = $con->query($sql_e_b);
		
		$book = $rs->fetch_object();
		
		$sql_auth_u = "SELECT * FROM `author`,book_author where book_author.author_id=author.author_id and book_author.book_id={$b_id}";
		$auth_u = $con->query($sql_auth_u);
		
		
		
		while($au=$auth_u->fetch_object()){
			$ba [] = $au->author_id;
		}
		
		$bn = $book->book_name;
		$bc = $book->category;
		$bp = $book->book_pub;
		$be = $book->book_edition;
		$bav = $book->available;
		$isb = $book->ISBN_number;
		$pr = $book->book_price;
		
	} 
	
	//add book
	 if(isset($_POST['addBook']))
	 {
		 $book_name = $_POST['bookName'];
		 $book_category = $_POST['bookCategory'];
		 $book_author = $_POST['bookAuthor'];
		 $book_publisher = $_POST['bookPublisher'];
		 $book_edition = $_POST['bookEdition'];
		 $book_available = $_POST['bookAvailable'];
		 $isbn_number = $_POST['isbnNumber'];
		 $price = $_POST['price'];

        $sql = "INSERT INTO `library`.`book` (`book_name`, `category`, `book_price`, `book_edition`, `ISBN_number`, `book_pub`,`available`) 
									  VALUES ('$book_name', '$book_category', '$price', '$book_edition', '$isbn_number', '$book_publisher', '$book_available');";


        $rs = $con->query($sql);
		$book_id = $con->insert_id;
		
		for( $i=0; $i<count($book_author); $i++ ){
			$con->query("INSERT INTO `book_author` (`book_id`, `author_id`) VALUES ('$book_id', '{$book_author[$i]}')");
		}
		
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
		$book_name = $_POST['bookName'];
		$book_category = $_POST['bookCategory'];
		$book_author = $_POST['bookAuthor'];
		$book_publisher = $_POST['bookPublisher'];
		$book_edition = $_POST['bookEdition'];
		$book_available = $_POST['bookAvailable'];
		$isbn_number = $_POST['isbnNumber'];
		$price = $_POST['price'];
		
		$sql = "UPDATE `library`.`book` SET 
				`book_name` = '$book_name', 
				`category` = '$book_category', 
				`book_price` = '$price', 
				`book_edition` = '$book_edition', 
				`ISBN_number` = '$isbn_number', 
				`book_pub` = '$book_publisher', 
				`available` = '$book_available' 
				WHERE `book`.`book_id` = {$b_id};";
				
				
		$rs_u_b = $con->query($sql);
		
		$con->query("delete from book_author where book_id={$b_id }");
		
		for( $i=0; $i<count($book_author); $i++ ){
			$con->query("INSERT INTO `book_author` (`book_id`, `author_id`) VALUES ('{$b_id }', '{$book_author[$i]}')");
		}
		header('Location: booklist.php');
		
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
    <title>Add Book</title>
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
      <div class="panel-heading">Add Book</div>
       <div class="panel-body">
			<table class="table table-bordered">
							<thead>
								<tr>
									<td>
      <form class="w7-container" method="post" action="">

      <p>
      <label>Book Name</label>
      <input class="w3-input" type="text" name="bookName" placeholder="Book Name" value="<?php echo $bn; ?>" ></p>
	<p>
		<label>Book Category</label>
		<select class="form-control" name="bookCategory">
			<option <?php if($bc=="Engineering"){echo "selected"; } ?> >Engineering</option>
			<option <?php if($bc=="Medical"){echo "selected"; } ?> >Medical</option>
			<option <?php if($bc=="Business"){echo "selected"; } ?> >Business</option>
			<option <?php if($bc=="Fun & Game"){echo "selected"; } ?> >Fun & Game</option>
			<option <?php if($bc=="Religion"){echo "selected"; } ?> >Religion</option>
			<option <?php if($bc=="Music"){echo "selected"; } ?> >Music</option>
			<option <?php if($bc=="History"){echo "selected"; } ?> >History</option>
			<option <?php if($bc=="English"){echo "selected"; } ?> >English</option>
			<option <?php if($bc=="Math"){echo "selected"; } ?> >Math</option> 
			<option <?php if($bc=="Social Science"){echo "selected"; } ?> >Social Science</option>
			<option <?php if($bc=="Science"){echo "selected"; } ?> >Science</option>
			<option <?php if($bc=="Newspaper"){echo "selected"; } ?> >Newspaper</option>
			<option <?php if($bc=="General"){echo "selected"; } ?> >General</option>
			<option <?php if($bc=="Reference"){echo "selected"; } ?> >Reference</option>
		</select>
	</p>
       <p>
      
	<p>
		<label>Book Author</label>
		<select class="form-control" name="bookAuthor[]" multiple style="height: 200px;">
			<?php while($r=$auth->fetch_object()): ?>
				<option value="<?php echo $r->author_id; ?>" <?php if(in_array($r->author_id, $ba)){echo "selected"; } ?>   ><?php echo $r->author_name; ?></option>
			<?php endwhile; ?>
			
		</select >
	</p>
	<p><label>Book Publisher</label>
		<select class="form-control" name="bookPublisher" >
			<?php while($r=$publicatin->fetch_object()): ?>
				<option value="<?php echo $r->pub_id; ?>"  <?php if($bp==$r->pub_id){echo "selected"; } ?>  ><?php echo $r->publication." : ".$r->pub_name; ?></option>
			<?php endwhile; ?>
		</select>
	</p>
	  <p>
      <label>Book Edition</label>
      <input class="w3-input" type="text" name="bookEdition" placeholder="Book Edition" value="<?php echo $be; ?>" ></p>
      <p>
	  
      <label>Book Available</label>
	  <input class="w3-input" type="number" name="bookAvailable" placeholder="amount" min="0" value="<?php echo $bav; ?>"></p>
		</p>
		<p>
      <label>ISBN Number</label>
      <input class="w3-input" type="text" name="isbnNumber" placeholder="ISBN Number" value="<?php echo $isb; ?>">
      </p>
      <p>
      <label>Price</label>
      <input class="w3-input" type="number" name="price" min="1" placeholder="Price" value="<?php echo $pr; ?>">
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
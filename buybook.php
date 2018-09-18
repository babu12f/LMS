<?php
	require_once('db.php');
	
	if(!is_login()){
		header('Location: index.php');
	}
	
	//pf($_SESSION['buy']);
	//session_unset($_SESSION['buy']);
	if(isset($_POST['search'])){
		$sql_s_b = "SELECT * FROM `book`,publisher WHERE book.book_pub=publisher.pub_id ";
		
		if(isset( $_POST['b_n'] )){
			$sql_s_b .= " and book.book_name like '%{$_POST['b_n']}%' ";
		}
		if(isset( $_POST['c_n'] )){
			$sql_s_b .= " and book.category = '{$_POST['c_n']}' ";
		}
		if(isset( $_POST['p_n'] )){
			$sql_s_b .= " and publisher.pub_id ={$_POST['p_n']} ";
		}
		if(isset( $_POST['a_n'] )){
			$sql_s_b = "SELECT * FROM `book`,author,book_author ,publisher
						WHERE book_author.book_id = book.book_id
						and  book.book_pub=publisher.pub_id
						and book_author.author_id = author.author_id and author.author_id = {$_POST['a_n']}";
		}
		//echo $sql_s_b;
		$books = $con->query($sql_s_b);
	}else{
		$sql_s_b = "SELECT * FROM `book`,publisher WHERE book.book_pub=publisher.pub_id limit 20";
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
		<div class="panel-heading">Buy Book</div>
		<div class="panel-body">
    <div class="table-responsive">	
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>
		<form action="" method="post" >
          <label class="control-label col-sm-2" for="email">Book Name:</label>
          <div class="col-md-4" style="width: 80%">
           <input type="text" id="disabledTextInput" name="b_n" class="form-control">
        </div>
        </th>
        <th>
			<select class="form-control" name="c_n">
				<option selected disabled>category name</option>
				<option>Engineering</option>
				<option>Medical</option>
				<option>Business</option>
				<option>Fun & Game</option>
				<option>Religion</option>
				<option>Music</option>
				<option>History</option>
				<option>English</option>
				<option>Math</option> 
				<option>Social Science</option>
				<option>Science</option>
				<option>Newspaper</option>
				<option>General</option>
				<option>Reference</option>
			</select>
      </th>
        <th>
          <select  class="form-control" name="a_n">
				<option selected disabled>auth name</option>
					<?php while($r=$auth->fetch_object()): ?>
					<option value="<?php echo $r->author_id; ?>"><?php echo $r->author_name; ?></option>
					<?php endwhile; ?>
			</select>
        </th>
      </tr>
	  <tr>
        <th>
			
			<select  class="form-control" name="p_n">
          <option selected disabled>pub name</option>
			<?php while($r=$publicatin->fetch_object()): ?>
				<option value="<?php echo $r->pub_id; ?>"><?php echo $r->publication." : ".$r->pub_name; ?></option>
			<?php endwhile; ?>
          </select>
        </th>
        <th>
			<button type="submit" class="btn btn-warning" name="search" >search</button>
		</th>
		<th>
			<a href="issuebuy.php"><button type="button" class="btn btn-inform" name="search" >Buy</button></a>
		</th>
		</form>
      </tr>
    </thead>
	</table>
	<table class="table table-bordered">
      <tr>
        <th>Book Name</th>
        <th>ISBN</th>
        <th>Book Author</th>
        <th>Edition</th>
        <th>Publication</th>
        <th>Category</th>
        <th>Price</th>
        <th>Availity</th>
        <th style="text-align:center;" >Add</th>
        <th style="text-align:center;" >Action</th>
      </tr>
	  <?php 
			while($b = $books->fetch_object()): 
			$sql_auth_n = $sql_s_b = " SELECT author.author_name FROM `book`,author,book_author 
						WHERE book_author.book_id = book.book_id
						and book_author.author_id = author.author_id and book_author.book_id = {$b->book_id} ";
			$auth_rs = $con->query($sql_auth_n);
			$a_name = "";
			while($a = $auth_rs->fetch_object()){
				$a_name .= $a->author_name;
				$a_name .=", ";
			}
			
	  ?>
	  
      <tr>
        <td><?php echo $b->book_name; ?></td>
        <td><?php echo $b->ISBN_number; ?></td>
        <td><?php echo $a_name; ?></td>
        <td><?php echo $b->book_edition; ?></td>
        <td><?php echo $b->publication; ?></td>
        <td><?php echo $b->category; ?></td>
        <td><?php echo $b->book_price; ?></td>
        <td><?php echo $b->available; ?></td>
        <td style="text-align:center;" ><a href="add_to_buy.php?b_id=<?php echo $b->book_id; ?>" ><button type="button" class="btn btn-success">+</button></a></td>
        <td style="text-align:center;" >
          <a href="addbook.php?b_id=<?php echo  $b->book_id;  ?>" ><button type="button" class="btn btn-warning">Edit</button></a>
          <a  href="del_book.php?b_id=<?php echo $b->book_id;  ?>" ><button type="button" class="btn btn-danger" style="margin-right: 20px">Detete</button></a>
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

<?php
     require_once('db.php');
	
	if(!is_login()){
		header('Location: index.php');
	}
	
	$fn = "";
	$ln = "";
	$mn = "";
	$a = "";
	$e = "";
	$bd = "";
	$gn = "";
	
	if(isset($_GET['m_id'])){
		$m_id = $_GET['m_id'];
		
		$sql_e_u = "select * from member where member_id={$m_id}";
		$rs = $con->query($sql_e_u);
		$mem = $rs->fetch_object();
		
		$fn = $mem->first_name; ;
		$ln = $mem->last_name;
		$mn = $mem->phone;
		$a = $mem->address;
		$e = $mem->email;
		$bd = $mem->birthday;
		$gn = $mem->gender;
		
		
		
	} 
	
	 if(isset($_POST['signup']))
	 {
		 $first_name = $_POST['firstName'];
		 $last_name = $_POST['lastName'];
		 $email = $_POST['email'];
		 $password = $_POST['password'];
		 $confirm_password = $_POST['confirm_password'];
		 $phone = $_POST['phone'];
		 $address = $_POST['address'];
		 $birthday = $_POST['birthday'];
		 $gender = $_POST['gender'];
		 
		 $date_f = date("Y-m-d",strtotime($birthday));
		 
		 $sql = "insert into member(first_name,last_name,email,password,gender,phone,address,birthday)
		                            values('$first_name','$last_name','$email','$password','$gender','$phone','$address','$date_f')";
									
									
									
		$rs = $con->query($sql);
		if($rs)
		{
			echo "success";
		}
		else
		{
			echo "faild";
		} 
	 }
	
	if(isset($_POST['update'])){
		$first_name = $_POST['firstName'];
		$last_name = $_POST['lastName'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$birthday = $_POST['birthday'];
		$gender = $_POST['gender'];
		
		$date_f = date("Y-m-d",strtotime($birthday));
		 
		$sql_u = "UPDATE `library`.`member` 
				SET `first_name` = '$first_name', 
				`last_name` = '$last_name', 
				`email` = '$email', 
				`phone` = '$phone', 
				`birthday` = '$date_f', 
				`gender` = '$gender', 
				`address` = '$address' 
				WHERE `member`.`member_id` = '$m_id' ";
				
		$rs = $con->query($sql_u);
		
		if($rs)
		{
			echo "success update";
			header('Location: memberlist.php');
		}
		else
		{
			echo "faild to updaate";
		} 
	}
	 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>sign up</title>
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
    <div class="col-md-8 col-md-offset-2" style="margin-top:40px;">
	<div class="panel panel-primary">
      <div class="panel-heading">Add Member</div>
       <div class="panel-body">
			<table class="table table-bordered">
							<thead>
								<tr>
									<td>
     <div class="w3-contai">
       </div>

      <form class="w7-container" method="post" action="">

      <p>
      <label>First Name</label>
      <input class="w3-input" type="text" name="firstName" placeholder="First Name" value="<?php echo $fn; ?>" ></p>

      <p>
      <label>Last Name</label>
      <input class="w3-input" type="text" name="lastName" placeholder="Last Name" value="<?php echo $ln; ?>" ></p>

      <p>
      <label>Email</label>
      <input class="w3-input" type="email" name="email" placeholder="Enter Email" value="<?php echo $e; ?>" ></p>
      <p>
      <label>Phone</label>
      <input class="w3-input" type="text" min="1" name="phone" placeholder="Enter Phone Number" value="<?php echo $mn; ?>" ></p>
      <p>
	  <p>
      <label>Address</label>
      <input class="w3-input" type="text" name="address" placeholder="Address" value="<?php echo $a; ?>" ></p>
      <p>
      <label>Birthday</label>
      <input class="w3-input" name="birthday" type="date" <?php if($bd != ""){?>value="<?php echo date('Y-m-d', strtotime($bd));  ?>"<?php }?> ></p>
      <p>
      <label>Gender</label>
       <select class="form-control" name="gender">
          <option name="gender" disabled >I am...</option>
          <option name="gender" <?php if( $gn == "Male"){echo "selected";} ?> >Male</option>
          <option name="gender" <?php if( $gn== "Female"){echo "selected";} ?>  >Female</option>
          </select></p>
		  <?php if(isset($_GET['m_id'])): ?>
		  
		  <button type="submit" class="btn btn-primary" name="update">Update</button>
		  <?php else: ?>
          <button type="submit" class="btn btn-primary" name="signup">Submit</button>

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

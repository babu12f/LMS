<?php
	require_once('db.php');
	
	if(!is_login()){
		header('Location: index.php');
	}
	
	if(isset($_POST['s_m'])){
		$sql_s_m = " select * from member ";
					
		if(isset($_POST['m_n']) && $_POST['m_n']!=""  ){
			$t = $_POST['m_n'];
			$sql_s_m = "SELECT s.* FROM (
										SELECT m.*, CONCAT(first_name,last_name) as s_n 
										FROM `member` m
									) s
					WHERE s_n like '%$t%' ";
		}
		if(isset($_POST['m_i']) && $_POST['m_i']!="" ){
			$sql_s_m = " select * from member where member_id={$_POST['m_i']} ";
		}
		
	}else{
		$sql_s_m = " select * from member ";
	}
	//echo $sql_s_m;
	$rs =$con->query($sql_s_m );
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>member list</title>
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
      <div class="panel-heading">Member List</div>
       <div class="panel-body"> 
	   <div class="table-responsive">
    <table class="table table-bordered">
    <thead>
		<tr>
			<th>
				<form action="" method="post" >
					<label class="control-label col-sm-2" for="email">Member Name:</label>
						<div class="col-md-4" style="width: 80%">
						<input type="text" id="disabledTextInput" name="m_n" class="form-control">
					</div>
			</th>
			<th>
					<label class="control-label col-sm-2" for="email">Member ID:</label>
					<div class="col-md-4" style="width: 80%">
						<input type="text" id="disabledTextInput" name="m_i" class="form-control">
					</div>
			</th>
			<th>
					<button type="submit" class="btn btn-warning" name="s_m" >search</button>
				</form>
			</th>
		</tr>
	 
    </thead>
    <table class="table table-bordered">
    <thead>
      <tr class="">
        <th>NAME</th>
		<th>EMAIL</th>
        <th>GENDER</th>
        <th>ADDRESS </th>
        <th >PHONE </th>
        <th>BIRTHDAY</th>		
        <th>Action</th>
		
      </tr>
	  <?php while($result=$rs->fetch_object()):?>
		<tr>
			<th><?php echo $result->first_name." ".$result->last_name;?></th>
			<th><?php echo $result->email;?></th>
			<th><?php echo $result->gender;?></th>
			<th><?php echo $result->address;?></th>
			<th><?php echo $result->phone;?></th>
			<th><?php echo $result->birthday;?></th>
			<th>
			  <a href="singup.php?m_id=<?php echo $result->member_id; ?>" ><button type="button" class="btn btn-warning">Edit</button></a>
			  <a href="del_mem.php?m_id=<?php echo $result->member_id; ?>"  ><button type="button" class="btn btn-danger" style="margin-right: 20px">Detete</button></a>
			</th>
		</tr>
	  <?php endwhile; ?>
    </thead>
	</div>
  </div>
</div>
</div>
</div>
</div>
</body>
</html>
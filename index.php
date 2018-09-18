<?php
	require_once('db.php');
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
	<style>
	  .carousel-inner > .item > img,
	  .carousel-inner > .item > a > img {
		  width: 100%;
		  margin: auto;
	  }
  </style>
  </head>
<body class="w3-container-fluid">
<?php require_once('navbar.php'); ?>
<div class="container" style="min-height:450px">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
	  <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="books1.jpg" alt="Chania" width="460" height="345">
      </div>

      <div class="item">
        <img src="books.jpg" alt="Chania" width="460" height="345">
      </div>
    
      <div class="item">
        <img src="books2.jpg" alt="Flower" width="460" height="345">
      </div>

      <div class="item">
        <img src="books3.jpg" alt="Flower" width="460" height="345">
      </div>
	  <div class="item">
        <img src="books4.jpg" alt="Flower" width="460" height="345">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


	<footer class="w3-container  w3-xlarge" style="background-color:#337AB7; margin-top:30px;">
		   <div class="container text-center"><p>&copy RAB</p></div>
	</footer> 
</body>
</html> 

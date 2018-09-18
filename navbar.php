<nav class="navbar navbar-inverse">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">RAB L.M.S</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="index.php"><i class="fa fa-home"></i>Home <span class="sr-only">(current)</span></a></li>

		<?php if(!is_login()):?>
			<li><a href="login.php">Login</a></li>
		<?php else: ?>
			<li><a href="logout.php">Logout</a></li>
		<?php endif; ?>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Book<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="addbook.php">Add Book</a></li>
            <li><a href="booklist.php"> Book List</a></li>
          </ul>
        </li>
		
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Member<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="singup.php">Add Member</a></li>
            <li><a href="memberlist.php"> Member List</a></li>
          </ul>
        </li>
		
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Borrow<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="booklist.php">Borrow Book</a></li>
            <li><a href="viewborrowedbooks.php"> View Borrow book</a></li>
            <li><a href="borrowedbooks.php">Borrowered List</a></li>
          </ul>
        </li>
      </ul>
	  
      <ul class="nav navbar-nav navbar-right">
		
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Buy<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="buybook.php">Buy Book</a></li>
            <li><a href="productlist.php"> Buy Other</a></li>
          </ul>
        </li>
		
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Product<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="addproduct.php">Add Product</a></li>
            <li><a href="productlist.php"> Product List</a></li>
          </ul>
        </li>
		
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Publication Author<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="addpublisher.php">Add Publication</a></li>
            <li><a href="addpublisher.php"> Add Author</a></li>
          </ul>
        </li>
		
		<?php if(for_admin()):?>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Liberian<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="addliberian.php">Add Liberian</a></li>
            <li><a href="liberianlist.php"> Liberian List</a></li>
          </ul>
        </li>
		<?php endif; ?>
		<?php if(is_login()):?>
			<li><a href="editliberian.php">Change Pass</a></li>
		<?php endif; ?>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Mirrored from html.crunchpress.com/book-store/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Jul 2016 15:08:48 GMT -->
<head>
<title>Book Store</title>
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<meta name="viewport" content="width=device-width">
<!-- Css Files Start -->
<link href="<?php echo FRONTENED_URL; ?>css/style.css" rel="stylesheet" type="text/css" /><!-- All css -->
<link href="<?php echo FRONTENED_URL; ?>css/bs.css" rel="stylesheet" type="text/css" /><!-- Bootstrap Css -->
<link rel="stylesheet" type="text/css" href="<?php echo FRONTENED_URL; ?>css/main-slider.css" /><!-- Main Slider Css -->
<!--[if lte IE 10]><link rel="stylesheet" type="text/css" href="css/customIE.css" /><![endif]-->
<link href="<?php echo FRONTENED_URL; ?>css/font-awesome.css" rel="stylesheet" type="text/css" /><!-- Font Awesome Css -->
<link href="<?php echo FRONTENED_URL; ?>css/font-awesome-ie7.css" rel="stylesheet" type="text/css" /><!-- Font Awesome iE7 Css -->
<!-- Booklet Css -->
<link href="<?php echo FRONTENED_URL; ?>css/jquery.booklet.latest.css" type="text/css" rel="stylesheet" media="screen, projection, tv" />
<noscript>
<link rel="stylesheet" type="text/css" href="<?php echo FRONTENED_URL; ?>css/noJS.css" />
</noscript>
<!-- Css Files End -->
	
	<!-- Color Switcher -->
		<link href="<?php echo FRONTENED_URL; ?>css/switcher.css" rel="stylesheet" type="text/css" /> 
			<!--Skin -->
			<link rel="stylesheet" name="skins" href="<?php echo FRONTENED_URL; ?>css/default.css" type="text/css" media="all">
			<!-- skins -->
	<!-- end of Color Switcher -->
	
</head>
<body>
<!-- Start Main Wrapper -->
<div class="wrapper">
  <!-- Start Main Header -->
  <!-- Start Top Nav Bar -->
  <section class="top-nav-bar">
    <section class="container-fluid container">
      <section class="row-fluid">
        <section class="span6">
          <ul class="top-nav">
            <li><a href="index.php" class="active">Home page</a></li>
            <li><a href="cart.php">Cart</a></li>
            <li><a href="login.php?action=logout">Logout</a></li>
          </ul>
        </section>
        <section class="span6 e-commerce-list">
          <ul>


<?php if(isset($_SESSION['logged_in_customer'])){ ?>
             <?php echo $_SESSION['customer_id']; ?> <li>Welcome! <a href="login.php"><?php echo ucfirst($_SESSION['logged_in_customer']); ?></a></li>
<?php }else{ ?>
              <li>Welcome! <a href="login.php">Login</a> or <a href="register.php">Create an account</a></li>
<?php } ?>

          </ul>
          <div class="c-btn"> <a href="cart.php" class="cart-btn">Cart</a>
            <div class="btn-group">
              <button data-toggle="dropdown" class="btn btn-mini dropdown-toggle"><?php total_items(); ?> item(s) - Nrs:<?php total_price(); ?><span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
              </ul>
            </div>
          </div>
        </section>
      </section>
    </section>
  </section>
  <!-- End Top Nav Bar -->
  <header id="main-header">
    <section class="container-fluid container">
      <section class="row-fluid">
        <section class="span4">
          <h1 id="logo"> <a href="index-2.html"><img src="images/logo.png" /></a> </h1>
        </section>
        <section class="span8">
          <ul class="top-nav2">
            <li><a href="checkout.html">My Account</a></li>
            <li><a href="cart.php">My Cart</a></li>
            <li><a href="checkout.html">Checkout</a></li>
            <li><a href="order-recieved.html">Track Your Order</a></li>
          </ul>
          <div class="search-bar">
            <input name="" type="text" value="search entire store here..." />
            <input name="" type="button" value="Serach" />
          </div>
        </section>
      </section>
    </section>
    <!-- Start Main Nav Bar -->
    <nav id="nav">
      <div class="navbar navbar-inverse">
        <div class="navbar-inner">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li> <a href="index.php">Books</a> </li>
              <li> <a href="cart.php">Cart</a></li>
              <li><a href="login.php">Login</a></li>
              <li><a href="register.php">Register</a></li>
              <li class="dropdown"> <a class="dropdown-toggle" href="grid-view.html" data-toggle="dropdown">Movies & TV <b class="caret"></b> </a>
                <ul class="dropdown-menu">
                  <li><a href="#">Submenu Detail Column 1</a></li>
                  <li><a href="#">Submenu Detail Column 2</a></li>
                  <li><a href="#">Submenu Detail Column 3</a></li>
                </ul>
              </li>
              <li> <a href="grid-view.html">Music</a></li>
              <li> <a href="grid-view.html">Gift Cards</a> </li>
              <li><a href="grid-view.html">Deals & Offers</a></li>
            </ul>
          </div>
          <!--/.nav-collapse -->
        </div>
        <!-- /.navbar-inner -->
      </div>
      <!-- /.navbar -->
    </nav>
    <!-- End Main Nav Bar -->
  </header>
  <!-- End Main Header -->
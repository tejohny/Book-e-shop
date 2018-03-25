<html xmlns="http://www.w3.org/1999/xhtml">

<?php
	session_start();
	if( ! isset($_SESSION['username'])) {
		$_SESSION['username']='?';
	  $_SESSION['cart']='?';

	}
	require_once "internal/dbconnect.php";
?>

<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title>Untitled 1</title>
	<link href="./layout.css" rel="stylesheet">
	<link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://getbootstrap.com/docs/4.0/examples/dashboard/dashboard.css" rel="stylesheet">
	<link href="https://getbootstrap.com/docs/4.0/examples/album/album.css" rel="stylesheet">
	<link href="https://getbootstrap.com/docs/4.0/examples/signin/signin.css" rel="stylesheet">
	<link href="https://getbootstrap.com/docs/4.0/examples/album/album.css" rel="stylesheet">
	<link href="https://v4-alpha.getbootstrap.com/examples/grid/grid.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="ajax/price_update.js"></script>
	<script type="text/javascript" src="ajax/add_to_cart.js"></script>
  <script type="text/javascript" src="ajax/delete.js"></script>

</head>

<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
   <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarsEhttps://getbootstrap.com/docs/4.0/examples/album/album.css>
        <ul>
		  <li class="nav-item active">
            <a class="nav-link" href="index.php?p=start">Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
          <?php
         if($_SESSION['username'] == '?') {
          print<<<END
          <ul class="navbar-nav ml-auto">
          <li  class="nav-item">
            <a  class="nav-link" href="?p=login">Login</a>
          </li>
          </ul>
END;
        }
        if ($_SESSION['username'] != '?') {
         print <<<END
         <ul class="navbar-nav auto">
          <li class="nav-item">
            <a class="nav-link" href="?p=shopinfo">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?p=products">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?p=cart">Cart</a>
          </li>
           </ul>
         <ul class="navbar-nav ml-auto">
         <li  class="nav-item">
            <button type="button" class="btn btn-primary">Welcome : {$_SESSION['username']}</a>
         </li>
         </ul>
END;
        }
        ?>

      </div>
    </nav>

<?php

         if($_SESSION['username'] != '?') {
          print<<<END

<div class="container-fluid">
       <div class="row">
          <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <a class="nav-link" href="?p=my_orders">My Orders<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?p=mydetails">My Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?p=logout">Logout</a>
              </li>
            </ul>
            </nav>
         </div>
 </div>
END;
    }

    if ($_SESSION['username'] == 'admin') {
    print <<<END

<div class="container-fluid">
       <div class="row">
          <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
            <ul class="nav nav-pills flex-column">
              <li class="nav-item">
                <a class="nav-link" href="#">Customers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" onclick="show_all_orders();" >Orders</a>
              </li>
							<li class="nav-item">
                <a class="nav-link" href="?p=logout">Logout</a>
              </li>
            </ul>
            </nav>
         </div>
 </div>
END;
    }

?>


<div id="left">
<?php
	if($_SESSION['username']=='admin') {
		print "<h2>Admin MENU</h2>";
	}
?>
</div>

<!--Creation of cart-->
  <?php

  if(!is_array($_SESSION['cart'])) {
   $_SESSION['cart']=array();
  }

  ?>


<div id="content">
<?php
if( ! isset($_REQUEST['p'])) {
	$_REQUEST['p']='start';
}
$p = $_REQUEST['p'];

switch ($p){
case "start" :		require "internal/start.php";
					break;
case "shopinfo": 	require "internal/shopinfo.php";
					break;
case "login" :		require "internal/login.php";
					break;
case 'do_login':	require "internal/do_login.php";
					break;
case 'after_login':	require "internal/after_login.php";
					break;
case 'mydetails':  require "internal/mydetails.php";
          break;
case 'logout':  require "internal/logout.php";
          break;
case 'products':  require "internal/products.php";
          break;
case 'catinfo':		require "internal/catinfo.inc";
   		break;
case 'cart':   require "internal/cart.php";
      break;
case 'after_orderu':   require "internal/after_orderu.php";
      break;
case 'my_orders':   require "internal/my_orders.php";
      break;


default:
	print "Η σελίδα δεν υπάρχει";
}
?>
</div>
</body>
</html>

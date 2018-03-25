<?php
	session_start();
	$quantitea=$_REQUEST['q'];
	$prid=$_REQUEST['i'];

	$_SESSION['cart'][$prid] = $quantitea ;
?>

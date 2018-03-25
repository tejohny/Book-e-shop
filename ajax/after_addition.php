<?php
	session_start();
	$pid=$_REQUEST['i'];
	$_SESSION['cart'][$pid] += 1 ;


?>

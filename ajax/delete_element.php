<?php
session_start();
$delete=$_REQUEST['i'];
      $_SESSION['cart'][$delete]='';


      $_SESSION['cart'] = array_filter($_SESSION['cart']);

      $car2n=array();

      foreach ($_SESSION['cart'] as $s) {
        array_push($car2n,$s);
      }

      $_SESSION['cart']=array();

      foreach($car2n as $s){
        array_push($_SESSION['cart'],$s);
      }
      

?>      
<div class="album ml-sm-auto col-md-10 pt-3">
  <?php
    $sql = "INSERT INTO `orders`( `Customer`, `oDate`) VALUES (?,now())";
    if( $stmt = $mysqli->prepare($sql) ) {
      $stmt->bind_param("i", $_SESSION['customer_id']);
  		$stmt->execute();
    }

    $order_id=$mysqli->insert_id;
    $count=count($_SESSION['cart']);

    foreach ($_SESSION['cart'] as $p => $q) {
      $sql2 = "INSERT INTO `orderdetails`( `Orders`, `Quantity`,`Product`) VALUES (?,?,?)";
      if( $stmt2 = $mysqli->prepare($sql2) ) {
        $stmt2->bind_param("iii", $order_id,$q,$p);
    		$stmt2->execute();
      }
    }

    $_SESSION['cart']=array();

    print "<h1 align='center'>Your order has been completed<h1>";
  ?>
</div>

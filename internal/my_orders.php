 <div class="album ml-sm-auto col-md-10 pt-3">
 <?php

$sql1 = "Select Count(*) as lol from orders where Customer = ? ";
if( $stmt = $mysqli->prepare($sql1) ) {
  $stmt->bind_param("i", $_SESSION['customer_id']);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();

  if($row['lol'] > 0){

    print <<<END
          <div class="row">
            <div class="col-6 col-sm-3">
              <h3>Title </h3>
            </div>
            <div class="col-6 col-sm-3">
               <h3>Price</h3>
            </div>
            <div class="col-6 col-sm-3" align="center">
               <h3>Quantity</h3>
            </div>
            <div class="col-6 col-sm-3">
               <h3>Date</h3>
            </div>
          </div>

END;

     $sql = "select O.oDate as date, D.Quantity as qty, P.Title as tit, P.Price as prc from orders O join orderdetails D on O.ID = D.Orders join product P on D.Product=P.ID where O.Customer=?";

      if( $stmt = $mysqli->prepare($sql) ) {
      $stmt->bind_param("i", $_SESSION['customer_id']);
      $stmt->execute();
      $result = $stmt->get_result();
      while ($row = $result->fetch_assoc()) {
        $last_price= $row['prc'] * $row['qty'];
         print <<<END
          <div class="row">
            <div class="col-6 col-sm-3">
              <h5>$row[tit] </h5>
            </div>
            <div class="col-6 col-sm-3">
               <h5>$last_price € </h5>
            </div>
            <div class="col-6 col-sm-3" align="center">
               <h5>$row[qty]</h5>
            </div>
            <div class="col-6 col-sm-3">
               <h5>$row[date]</h5>
            </div>
          </div>

END;
      }
    }
 }
 else{
  print "<h1 align='center'>Δεν έχετε κάνει κάποια παραγγελία<h1>";
 }
}
?>
</div>

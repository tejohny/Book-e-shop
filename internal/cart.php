<div class="album ml-sm-auto col-md-10 pt-3">
<?php

  if(empty($_SESSION['cart'])){
    print "<h1 align='center'>Your cart is empty!<h1>";
  }else{

  $sql = "select * from product where ID=?";
  $stmt = $mysqli->prepare($sql);

  foreach($_SESSION['cart'] as $p => $q) {
     $stmt->bind_param("i", $p);
     $stmt->execute();
     $result = $stmt->get_result();
     $row = $result->fetch_assoc();
     $price=$row['Price'];
     $final_price=$row['Price']*$q;

     print <<<END
      <div class="row">
        <div class="col-6 col-sm-3">IMAGE
        </div>
        <div class="col-6 col-sm-3">$row[Title]
        </div>
        <div class="col-6 col-sm-3" align="center" ><h5 id="price$p" >$final_price $</h5>
      </div>
      <div class="col-6 col-sm-3">
             <input id="spinner$p" type="number" value="{$q}" name="quantity" min="1" max="99" oninput="update($price,$p);">
              <button class="dltbtn" id="delete" value="$p">Delete</button>
          </div>
      </div>
    
END;
  }

  print <<<END
    <form action="index.php" method="post">
      <input name="p" value="after_orderu" type="hidden">
      <input type="submit" value="Complete Order">
    </form>
END;
}
print_r($_SESSION['cart']);

?>
</div>

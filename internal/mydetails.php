<div id="content" class="ml-sm-auto col-md-10 pt-3">
  <?php
    if(isset($_REQUEST['action_save'])) {
      $sql = 'update customer set Fname=?, Lname=?, Address=?, Phone=? where ID=?';
      if( $stmt = $mysqli->prepare($sql) ) {
        $stmt->bind_param("sssii",$_REQUEST['name'],$_REQUEST['surname'],$_REQUEST['address'],$_REQUEST['phone'],$_SESSION['customer_id'] );
    		$stmt->execute();

        $_SESSION['name']=$_REQUEST['name'];
        $_SESSION['surname']=$_REQUEST['surname'];
        $_SESSION['address']=$_REQUEST['address'];
        $_SESSION['phone']=$_REQUEST['phone'];
      }
    }
    print<<<END
    <form method='post' action="index.php">
      <table>
        <tr><td class="text-right">Όνομα : </td>
          <td><input class="form-control" type='text' name='name' value="{$_SESSION['name']}"></td>
        </tr>
        <tr><td class="text-right">Επίθετο : </td>
          <td><input class="form-control" type='text' name='surname' value="{$_SESSION['surname']}"></td>
        </tr>
        <tr><td class="text-right">Διεύθυνση : </td>
          <td><input class="form-control" type='text' name='address' value="{$_SESSION['address']}"></td>
        </tr>
        <tr><td class="text-right">Τηλέφωνο : </td>
          <td><input class="form-control" type='text' name='phone' value="{$_SESSION['phone']}"></td>
        </tr>
        <tr><td colspan="2" class="text-center">
          <input type='submit' class="btn btn-primary" value='ΑΠΟΘΗΚΕΥΣΗ' name='action_save'>
          <input type='reset' class="btn btn-primary" value='ΑΝΑΙΡΕΣΗ'>
          <input type='hidden' name='p' value='mydetails'>
        </tr>
      </table>
   </form>
END;
print_r( $_SESSION['cart']);
    ?>
</div>

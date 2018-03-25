<div class="album text-muted ml-sm-auto col-md-10 pt-3">
<?php
	require "internal/menuleft.php";
?>
<?php
$cat = $_REQUEST['catid'];
$sql = "select * from product where Category=?";

if( $stmt = $mysqli->prepare($sql) ) {
	$stmt->bind_param("i", $cat);
	$stmt->execute();
	$result = $stmt->get_result();
	print<<<END
	<div class="container">
	<div class="row">
END;
	while ($row = $result->fetch_assoc()) {
	print<<<END
	<div class="card">
              <p class="card-text">$row[Title]</p>
              <img height="300 px" width="300 px" src="internal/laptop.jpg" alt="Card image cap">
              <label align="justify">$row[Description]</label>
							<label align="justify"></label>
							<label align="center">$row[Price] $</label>
							<button type="button" class="btn btn-primary" onclick="add($row[ID])">Buy it!</button>
						</div>
END;
	}
 print<<<END
	</div>
	</div>
END;


}
?>

</table>
</div>

Proccessing login.....

<?php
	$u = $_REQUEST['username'];
	$p = $_REQUEST['pass'];
  $sql = "SELECT COUNT(*) AS ok FROM customer WHERE uname=? AND passwd_enc=PASSWORD(?)";
	if( $stmt = $mysqli->prepare($sql) ) {
		$stmt->bind_param("ii", $u, $p);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		print "<br>";
		print "<br>";
		print "<br>";
		print "<br>";
		print "<br>";
		print $row['ok'];

		if($row['ok']=='1'){
			$sql2 = "SELECT Fname,Lname,uname,is_admin,id FROM customer WHERE uname=? AND passwd_enc=PASSWORD(?)";
			if( $stmt2 = $mysqli->prepare($sql2) ) {
				$stmt2->bind_param("ii", $u, $p);
				$stmt2->execute();
				$result2 = $stmt2->get_result();
				$row2 = $result2->fetch_assoc();

				$_SESSION['username']=$row2['uname'];
				$_SESSION['name']=$row2['Fname'];
				$_SESSION['surname']=$row2['Lname'];
				$_SESSION['customer_id']=$row2['id'];

				if($row2['is_admin']=='1'){
					print "Welcome admin";
					$_SESSION['username'] = 'admin';
					header('Location: index.php?p=afterlogin');
				}else{
					print "Welcome {$_SESSION['username']}";
					header('Location:  index.php?p=afterlogin');
				}
			}
		}else{
			print "Unknown user";
			$_SESSION['username'] = '?';
		}
	}
?>

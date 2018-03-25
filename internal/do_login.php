Proccessing login.....

<?php
	$u = $_REQUEST['username'];
	$p = $_REQUEST['pass'];
	$sql = "SELECT COUNT(*) AS ok FROM customer WHERE uname=? AND passwd_enc=PASSWORD(?)";
	print 'lalla';
	if( $stmt = $mysqli->prepare($sql) ) {
		$stmt->bind_param("ss", $u, $p);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();

		if($row['ok']=='1'){
			$sql2 = "SELECT Fname,Lname,uname,is_admin,id,Address,Phone FROM customer WHERE uname=? AND passwd_enc=PASSWORD(?)";
			if( $stmt2 = $mysqli->prepare($sql2) ) {
				$stmt2->bind_param("ss", $u, $p);
				$stmt2->execute();
				$result2 = $stmt2->get_result();
				$row2 = $result2->fetch_assoc();

				$_SESSION['username']=$row2['uname'];
				$_SESSION['name']=$row2['Fname'];
				$_SESSION['surname']=$row2['Lname'];
				$_SESSION['customer_id']=$row2['id'];
				$_SESSION['address']=$row2['Address'];
				$_SESSION['phone']=$row2['Phone'];

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
	} else {
		print 'error: ' . $mysqli->error;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<div class="container">
	<div class="row">
		<div class="col-md-12" align="center">
			<?php 
include 'dbconnect.php';
session_start();
 ?>
 <?php
 if (isset($_POST['email'])) {
 	$email = stripslashes($_POST['email']);
 	$email = filter_var(FILTER_VALIDATE_EMAIL);
 	$querry = "SELECT * FROM `customer_data` WHERE email = '$email'";
 	$result = mysqli_query($dbconnect, $querry);
 	$row = mysli_num_rows($result);
 	if ($row == 1) {
 		# code...
 		$_SESSION['email'] = $email;
 		header('location-home.php');
 	} else {
 		# code...
 		header('location-errors.html');
 	}
 	
 }
 ?>
<form action="login.php" method="POST">
	Email: <input type="email" name="email"><br>
	Login: <input type="sumbit" name="login"><br>
	Password: <input type="password" name="password">
</form>
		</div>
	</div>
</div>

</body>
</html>
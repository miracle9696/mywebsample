<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php 
include 'dbconnect.php';
session_start();
 ?>
<form action="login.php" method="POST">
	<input type="email" name="email"><br>
	<input type="sumbit" name="login">
</form>

</body>
</html>
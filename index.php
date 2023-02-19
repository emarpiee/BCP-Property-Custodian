<?php

require_once('config.php');
	//check if the user already logged in, if true always redirect to index
session_start();
if(isset($_SESSION['login_user'])){
	header('location:homeTest.php');
} 
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<title>Test DB Connection Page</title>
</head>
<body>
	<center>
		<a href="login.php" class="btn btn-primary" role="button">Go to BCP Property Custodian Login Page</a>
	</center>
	

</body>
</html>
<?php
require('config.php'); 
session_start ();
if(!isset($_SESSION["login_user"])){
	header("location:login.php"); 
}
$accId = $_SESSION['accId'];
$sql = mysqli_query($conn,"SELECT * FROM pc_accounts WHERE accId = $accId ");
$accInfo = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard Test</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<center>
			<?php 
			 echo "Welcome " . $accInfo['firstName'] .  " " . $accInfo['middleName'] . " " . $accInfo['lastName']; 
			 print_r($accInfo);

			?>
			<div>
				<a href="logout.php" class="btn btn-danger" role="button">Logout</a>
			</div>
		</center>
	</div>

</body>
</html>
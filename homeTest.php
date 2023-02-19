<?php 
session_start ();
if(!isset($_SESSION["login_user"])){
	header("location:login.php"); 
}
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
			<?php echo "Hello" . " " .$_SESSION['firstname']; ?>
			<div>
				<a href="logout.php" class="btn btn-danger" role="button">Logout</a>
			</div>
		</center>
	</div>

</body>
</html>
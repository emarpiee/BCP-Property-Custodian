<?php 	
	include('../configs/config.php');

	$sql = "INSERT INTO pc_accounts (firstName, lastName) VALUES ('insertFN', 'insertLN')";
	if($conn->query($sql) == TRUE){
		echo "SUCCESS!";
	} else {
		echo "FAILED" . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		Test 
	</title>
</head>
<body>

</body>
</html>

<!-- WORKING -->
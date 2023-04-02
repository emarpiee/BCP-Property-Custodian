<?php include('../config.php');
$id = $_POST['id'];
$sql = "SELECT * FROM pc_accounts WHERE accId = '$id' LIMIT 1";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>
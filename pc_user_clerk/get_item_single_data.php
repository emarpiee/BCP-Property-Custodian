<?php include('../config.php');
$requestID = $_POST['id'];
$sql = "SELECT * FROM pc_item_requests 
JOIN pc_accounts ON pc_item_requests.`requestorId` = pc_accounts.`accId` 
JOIN logistics_warehouse ON pc_item_requests.`itemId` = logistics_warehouse.`stockid` WHERE pc_item_requests.requestID = '$requestID' LIMIT 1";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($query);
echo json_encode($row);
?>
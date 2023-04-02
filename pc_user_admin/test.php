<?php include('../config.php');
session_start ();
$accId = $_SESSION['accId'];
$output= array();
$sql = "SELECT * FROM pc_item_requests 
JOIN pc_accounts ON pc_item_requests.`requestorId` = pc_accounts.`accId` 
JOIN logistics_warehouse ON pc_item_requests.`itemId` = logistics_warehouse.`stockid` WHERE pc_accounts.`accId` = '$accId'";

$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);
$query = mysqli_query($conn,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	echo $row['productname'];

	$sub_array = array();
	$sub_array[] = $row['requestID'];
	$sub_array[] = $row['productname'];
	$sub_array[] = $row['itemQuantity'];
	$sub_array[] = $row['statusOfRequest'];

	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['requestID'].'"  class="btn btn-primary btn-sm editbtn m-2" >Details</a>';
	$data[] = $sub_array;
}
?>

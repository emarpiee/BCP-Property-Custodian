<?php include('../config.php');
session_start ();
$accId = $_SESSION['accId'];
$output= array();
$sql = "SELECT * FROM pc_item_requests 
JOIN pc_accounts ON pc_item_requests.`requestorId` = pc_accounts.`accId` 
JOIN logistics_warehouse ON pc_item_requests.`itemId` = logistics_warehouse.`stockid` WHERE pc_accounts.`accId` = '$accId'";

$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'requestID',
	1 => 'productname',
	2 => 'itemQuantity',
	3 => 'statusOfRequest',,
);

if(isset($_POST['search']['value']))
{
	/*$search_value = $_POST['search']['value'];
	$sql .= " AND requestID like '%".$search_value."%'";
	$sql .= " OR productname like '%".$search_value."%'";
	$sql .= " OR statusOfRequest like '%".$search_value."%'";*/
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY requestID desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($conn,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{

	$sub_array = array();
	$sub_array[] = $row['requestID'];
	$sub_array[] = $row['productname'];
	$sub_array[] = $row['itemQuantity'];
	$sub_array[] = $row['statusOfRequest'];
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['requestID'].'"  class="btn btn-primary btn-sm editbtn m-2" >Details</a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo json_encode($output);

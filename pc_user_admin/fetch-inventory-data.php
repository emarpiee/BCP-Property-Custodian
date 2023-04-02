<?php include('../config.php');

$output= array();
$sql = "SELECT * FROM logistics_warehouse";

$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'stockid',
	1 => 'itemid',
	2 => 'productname',
	3 => 'quantity',
	3 => 'category',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE stockid like '%".$search_value."%'";
	$sql .= " OR itemid like '%".$search_value."%'";
	$sql .= " OR productname like '%".$search_value."%'";
	$sql .= " OR quantity like '%".$search_value."%'";
	$sql .= " OR category like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY stockid desc";
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
	$sub_array[] = $row['stockid'];
	$sub_array[] = $row['itemid'];
	$sub_array[] = $row['productname'];
	$sub_array[] = $row['quantity'];
	$sub_array[] = $row['category'];
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo json_encode($output);

<?php include('../config.php');

$output= array();
$sql = "SELECT * FROM ss_monitoring_facility";

$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id',
	1 => 'Concern',
	2 => 'status',
/*	3 => 'mobile',
	4 => 'city',*/
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE Concern like '%".$search_value."%'";
	$sql .= " OR id like '%".$search_value."%'";
	$sql .= " OR facility like '%".$search_value."%'";
	$sql .= " OR status like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id desc";
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
	$sub_array[] = $row['id'];
	$sub_array[] = $row['Concern'];
	$sub_array[] = $row['status'];

	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['id'].'"  class="btn btn-primary btn-sm editbtn m-2" >Details</a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo json_encode($output);

<?php include('../config.php');

$output= array();
$sql = "SELECT * FROM pc_accounts";

$totalQuery = mysqli_query($conn,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'accId',
	1 => 'deptName',
	2 => 'accStatus',
/*	3 => 'mobile',
	4 => 'city',*/
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE firstName like '%".$search_value."%'";
	$sql .= " OR lastName like '%".$search_value."%'";
	$sql .= " OR deptName like '%".$search_value."%'";
	$sql .= " OR deptRoom like '%".$search_value."%'";
	$sql .= " OR deptCampus like '%".$search_value."%'";
	$sql .= " OR contactNumber like '%".$search_value."%'";
	$sql .= " OR accId like '%".$search_value."%'";
	$sql .= " OR accountStatus like '%".$search_value."%'";
/*	$sql .= " OR city like '%".$search_value."%'";*/
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY accId desc";
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
	//ACC STATUS FK
	/*$accStatus = "";
	if($row['accountStatus'] == 1) {
		$accStatus = 'PENDING';
	} else if ($row['accountStatus'] == 2) {
		$accStatus = 'ACTIVE';
	} else if ($row['accountStatus'] == 3) {
		$accStatus = 'DECLINED';
	} else if ($row['accountStatus'] == 4) {
		$accStatus = 'ARCHIVED';
	}*/

	$sub_array = array();
	$sub_array[] = $row['accId'];
	$sub_array[] = $row['deptName'];
	$sub_array[] = $row['accStatus'];

	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['accId'].'"  class="btn btn-primary btn-sm editbtn m-2" >Details</a>  <a href="javascript:void();" data-id="'.$row['accId'].'"  class="btn btn-danger btn-sm deleteBtn" >Delete</a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo json_encode($output);

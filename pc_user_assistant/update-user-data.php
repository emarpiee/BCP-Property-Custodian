<?php 
include('../config.php');
$deptName = mysqli_real_escape_string($conn,$_POST['deptName']);
$deptRoom = mysqli_real_escape_string($conn,$_POST['deptRoom']);
$deptCampus = mysqli_real_escape_string($conn,$_POST['deptCampus']);
$contactNumber = mysqli_real_escape_string($conn,$_POST['contactNumber']);
$firstName = mysqli_real_escape_string($conn,$_POST['firstName']);
$lastName = mysqli_real_escape_string($conn,$_POST['lastName']);
$userEmail = mysqli_real_escape_string($conn,$_POST['userEmail']);
$accStatus = mysqli_real_escape_string($conn,$_POST['accStatus']);
$id = $_POST['id'];

$sql = "UPDATE pc_accounts SET deptName = '$deptName', deptRoom = '$deptRoom', deptCampus = '$deptCampus', contactNumber = '$contactNumber', firstName = '$firstName', lastName = '$lastName', userEmail = '$userEmail', accStatus = '$accStatus' WHERE accId='$id' ";
$query= mysqli_query($conn,$sql);
$lastId = mysqli_insert_id($conn);
if($query == true)
{
   
    $data = array(
        'status'=>'true',
       
    );

    echo json_encode($data);
}
else
{
     $data = array(
        'status'=>'false',
      
    );

    echo json_encode($data);
} 

?>
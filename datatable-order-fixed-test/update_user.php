<?php 
include('../config.php');
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$userEmail = $_POST['userEmail'];
$accStatus = $_POST['accStatus'];
$id = $_POST['id'];

$sql = "UPDATE pc_accounts SET firstName = '$firstName', lastName = '$lastName', userEmail = '$userEmail', accStatus = '$accStatus' WHERE accId='$id' ";
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
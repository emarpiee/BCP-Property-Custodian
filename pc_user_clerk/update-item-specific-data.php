<?php 
include('../config.php');
$itemQuantity = mysqli_real_escape_string($conn,$_POST['itemQuantity']);
$statusOfRequest = mysqli_real_escape_string($conn,$_POST['statusOfRequest']);
$requestID = $_POST['id'];

$sql = "UPDATE pc_item_requests SET itemQuantity = '$itemQuantity', statusOfRequest = '$statusOfRequest' WHERE requestID='$requestID' ";
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
<?php 
include('../config.php');
$received_by = mysqli_real_escape_string($conn,$_POST['received_by']);
$status = mysqli_real_escape_string($conn,$_POST['statuss']);
$eta = mysqli_real_escape_string($conn,$_POST['eta']);
$concern = mysqli_real_escape_string($conn,$_POST['concern']);
$sm = mysqli_real_escape_string($conn,$_POST['sm']);

$id = $_POST['id'];

$sql = "UPDATE ss_monitoring_facility SET received_by = '$received_by', status = '$status', delivery_date = '$eta' WHERE id='$id' ";
$query= mysqli_query($conn,$sql);
$lastId = mysqli_insert_id($conn);
if($query == true)
{
    $itemType = 'item-specific';
    $itemQuantity = 1;
    $itemSpecific = $concern;
    $stockid = 0;
    $itemMessage = $sm;
    $requestorId = 20; // ACC ID OSAS
    $sql = "INSERT INTO pc_item_requests (itemType, itemSpecific, itemId, itemMessage, itemQuantity, requestorId) VALUES ('$itemType','$itemSpecific','$stockid', '$itemMessage', '$itemQuantity', '$requestorId') ";
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
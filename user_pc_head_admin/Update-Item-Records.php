<?php
 include '../config.php';
 if (isset($_POST['updateRequestID'])) {
     $requestID = $_POST['updateRequestID'];
     /*$sql = "SELECT * FROM `users` WHERE UserID=$UserID";*/
     $sql = "SELECT * FROM pc_item_requests JOIN pc_accounts ON pc_item_requests.`requestorId` = pc_accounts.`accId` JOIN pc_items ON pc_item_requests.`itemID` = pc_items.`itemID` LEFT JOIN pc_item_request_status ON pc_item_requests.`statusOfRequestId` = pc_item_request_status.`statusOfRequestId` JOIN pc_item_type ON pc_items.`itemTypeId` = pc_item_type.`itemTypeId` WHERE pc_item_requests.`requestID`=$requestID";
     $result = mysqli_query($conn,$sql);
     $response = array();
     while ($row = mysqli_fetch_assoc($result)) {
         $response = $row;
     }
     echo json_encode($response);
 }else {
     $response['status'] =200;
     $response['message'] ="Invalid or data not found";
 }

  if(isset($_POST['updateRequestID'])) {
     $UniqueID = $_POST['hiddenData'];
     $itemQuantity = $_POST['updateRequestID'];
     
     $sql = "UPDATE pc_item_requests SET itemQuantity ='$itemQuantity' WHERE requestID = '$UniqueID'";
     $result=mysqli_query($con, $sql);
 }
/* if(isset($_POST['hiddenData'])) {
     $UniqueID = $_POST['hiddenData'];
     $FirstName = $_POST['firstNameEdit'];
     $LastName = $_POST['lastNameEdit'];
     $Email = $_POST['emailEdit'];
     $Mobile = $_POST['mobileEdit'];
     $sql = "UPDATE `users` SET FirstName='$FirstName', LastName='$LastName', 
     Email='$Email', Mobile='$Mobile' WHERE UserID='$UniqueID'";
     $result=mysqli_query($con, $sql);
 }*/
?>
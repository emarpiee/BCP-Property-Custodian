<?php
 include 'connect.php';
 if (isset($_POST['updateUserID'])) {
     $UserID = $_POST['updateUserID'];
     $sql = "SELECT * FROM `users` WHERE UserID=$UserID";
     $result = mysqli_query($con,$sql);
     $response = array();
     while ($row = mysqli_fetch_assoc($result)) {
         $response = $row;
     }
     echo json_encode($response);
 }else {
     $response['status'] =200;
     $response['message'] ="Invalid or data not found";
 }
 if(isset($_POST['hiddenData'])) {
     $UniqueID = $_POST['hiddenData'];
     $FirstName = $_POST['firstNameEdit'];
     $LastName = $_POST['lastNameEdit'];
     $Email = $_POST['emailEdit'];
     $Mobile = $_POST['mobileEdit'];
     $sql = "UPDATE `users` SET FirstName='$FirstName', LastName='$LastName', 
     Email='$Email', Mobile='$Mobile' WHERE UserID='$UniqueID'";
     $result=mysqli_query($con, $sql);
 }
?>
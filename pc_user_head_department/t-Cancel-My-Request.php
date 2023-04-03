<?php 
include('../config.php');
if(isset($_GET['requestID'])){

    $updateStatus = "CANCELLED";
    $requestID = mysqli_real_escape_string($conn,$_GET['requestID']);

    $sql2 = "UPDATE pc_item_requests SET statusOfRequest ='$updateStatus' WHERE requestID = '$requestID' ";
    if(mysqli_query($conn, $sql2)){
        echo 'approved';
        header("location:t-My-Requests.php"); 
    }  else {
                // error
        echo 'query error' . mysqli_error($conn);
    }

    mysqli_free_result($result);
    mysqli_close($conn);

}
?>
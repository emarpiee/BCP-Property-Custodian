<?php 
include('../config.php');
session_start();
if(!isset($_SESSION["login_user"])){
    header("location:../login.php"); 
}
$accId = $_SESSION['accId'];
$sql = mysqli_query($conn,"SELECT * FROM pc_accounts WHERE accId = $accId ");
$accInfo = mysqli_fetch_array($sql);
if($_SESSION['roleId'] == 2) { // PC CLERK
    header("location:../user_pc_head_admin/dashboard.php");
} else if($_SESSION['roleId'] == 3){ //Head Department
    header("location:../user_head_department/dashboard.php");
} else if($_SESSION['roleId'] == 4){ // PC AUDITOR
    header("location:../user_pc_auditor/dashboard.php");
} else if($_SESSION['roleId'] == 5){ // PC ASSISTANT
    header("location:../user_pc_assistant/dashboard.php");
}
if(isset($_GET['requestID'])){

        //escaping any sensitve sql character to protect db
    $requestID = mysqli_real_escape_string($conn,$_GET['requestID']);

    $sql2 = "UPDATE pc_item_requests SET statusOfRequestId = 3 WHERE requestID = '$requestID' "; // 3 = decline
    if(mysqli_query($conn, $sql2)){
        echo 'approved';
        header("location:Item-Records.php"); 
    }  else {
                // error
        echo 'query error' . mysqli_error($conn);
    }

    mysqli_free_result($result);
    mysqli_close($conn);

}
?>
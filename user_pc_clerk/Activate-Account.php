<?php 
include('../config.php');
session_start();
if(!isset($_SESSION["login_user"])){
    header("location:../login.php"); 
}
$accId = $_SESSION['accId'];
$sql = mysqli_query($conn,"SELECT * FROM pc_accounts WHERE accId = $accId ");
$accInfo = mysqli_fetch_array($sql);
if($_SESSION['roleId'] == 1) { // PC HEAD
    header("location:../user_pc_head_admin/dashboard.php");
} else if($_SESSION['roleId'] == 3){ //Head Department
    header("location:../user_head_department/dashboard.php");
} else if($_SESSION['roleId'] == 4){ // PC AUDITOR
    header("location:../user_pc_auditor/dashboard.php");
} else if($_SESSION['roleId'] == 5){ // PC ASSISTANT
    header("location:../user_pc_assistant/dashboard.php");
}
if(isset($_GET['id'])){

        //escaping any sensitve sql character to protect db
    $id = mysqli_real_escape_string($conn,$_GET['id']);

    $sql2 = "UPDATE pc_accounts SET accountStatus = 2 WHERE accId = '$id' ";
    if(mysqli_query($conn, $sql2)){
        echo 'activated';
        header("location:Account-Records.php"); 
    }  else {
                // error
        echo 'query error' . mysqli_error($conn);
    }

    mysqli_free_result($result);
    mysqli_close($conn);

}
?>
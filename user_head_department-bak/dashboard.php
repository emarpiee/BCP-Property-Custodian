<?php
/*include('../config.php'); 

session_start ();

if(!isset($_SESSION["login_user"])){
    header("location:../login.php"); 
}

$accId = $_SESSION['accId'];
$sql = mysqli_query($conn,"SELECT * FROM pc_accounts WHERE accId = $accId ");
$accInfo = mysqli_fetch_array($sql);
if($_SESSION['roleId'] == 1){ // PC HEAD
    header("location:../user_pc_head_admin/dashboard.php");
} else if($_SESSION['roleId'] == 2) { // PC CLERK
    header("location:../user_pc_clerk/dashboard.php");
} else if($_SESSION['roleId'] == 4){ // PC AUDITOR
    header("location:../user_pc_auditor/dashboard.php");
} else if($_SESSION['roleId'] == 5){ // PC ASSISTANT
    header("location:../user_pc_assistant/dashboard.php");
}
*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BCP Property Custodian Dashboard</title>
    <link rel="stylesheet" href="../style/main.css" />
    <link rel="stylesheet" href="../style/sidebar.css" />
    <link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>

    <?php include('temps/header.php'); ?>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Launch static backdrop modal
  </button>

  
<?php include('temps/footer.php'); ?>

</body>
</html>
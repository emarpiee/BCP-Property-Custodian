<?php
include('../config.php'); 

session_start ();

if(!isset($_SESSION["login_user"])){
    header("location:../login.php"); 
}

$accId = $_SESSION['accId'];
$sql = mysqli_query($conn,"SELECT * FROM pc_accounts WHERE accId = $accId ");
$accInfo = mysqli_fetch_array($sql);
if($_SESSION['userRole'] == 'Property Custodian Clerk') { // PC CLERK
    header("location:../user_pc_clerk/dashboard.php");
} else if($_SESSION['userRole'] == 'Head of the Department'){ //Head Department
    header("location:../user_head_department/dashboard.php");
} else if($_SESSION['userRole'] == 'Property Custodian Auditor'){ // PC AUDITOR
    header("location:../user_pc_auditor/dashboard.php");
} else if($_SESSION['userRole'] == 'Property Custodian Assistant'){ // PC ASSISTANT
    header("location:../user_pc_assistant/dashboard.php");
}
?>
<!DOCTYPE html>
<html oncontextmenu="return false"  lang="en"> <!-- prevent user from right clicking -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Admin</title>
    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="../style/sidebar.css" />
    <link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="../style/main.css" />
    <link rel="stylesheet" href="../style/bootstrap.css" />
    <link rel="stylesheet" href="../style/dt-1.13.4.min.css" />
    <link rel="stylesheet" href="../style/login.css" />
    <link rel="stylesheet" href="../style/separator.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- LOGO -->
    <link rel="icon" type="image/x-icon" href="../assets/images/bcp-logo.png">
</head>
<body>
    <!-- CONTENTS HERE -->


    <?php include('temps/header.php'); ?>

        <div>

        </div>

    <?php include('temps/footer.php'); ?>


    <!-- SCRIPTS -->
    <script src="../script/jquery-3.6.4.min.js" crossorigin="anonymous"></script>
    <script src="../script/bootstrap.bundle.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../script/datatables.min.js"></script>
    <script>
    // initialize tooltips
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

        // prevent user from using F12 (inspect element)
        $(document).keydown(function(e){ 
            if(e.which === 123){ 

                return false; 

            } 

        });
    </script>
</body>
</html>
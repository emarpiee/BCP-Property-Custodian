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
  header("location:../pc_user_clerk/dashboard.php");
} else if($_SESSION['userRole'] == 'Property Custodian Head'){ //Head Department
  header("location:../pc_user_admin/dashboard.php");
} else if($_SESSION['userRole'] == 'Property Custodian Auditor'){ // PC AUDITOR
  header("location:../pc_user_auditor/dashboard.php");
} else if($_SESSION['userRole'] == 'Property Custodian Assistant'){ // PC ASSISTANT
  header("location:../pc_user_assistant/dashboard.php");
}

$sql = "SELECT * FROM pc_item_requests WHERE statusOfRequest = 'PENDING'";
$result = mysqli_query($conn, $sql);
$pendingRequests = mysqli_num_rows($result);

$sql = "SELECT * FROM pc_accounts";
$result = mysqli_query($conn, $sql);
$totalNumberOfAccounts = mysqli_num_rows($result);

$sql = "SELECT * FROM pc_item_requests JOIN pc_accounts ON pc_item_requests.`requestorId` = pc_accounts.`accId` WHERE accId = $accId";
$result = mysqli_query($conn, $sql);
$myTotalRequests = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html oncontextmenu="return false"  lang="en"> <!-- prevent user from right clicking -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
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
        <div class="row">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger">ANNOUNCEMENTS</h6>
                </div>
                <div class="card-body">
                    There will be no transactions during Holy Week! The transaction will be resumed next week.
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Number of Accounts</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $totalNumberOfAccounts; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-person-fill fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                My Total Number of Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $myTotalRequests; ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-card-checklist fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Item Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">

                                    <?php echo $pendingRequests;?>

                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-mailbox2 fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
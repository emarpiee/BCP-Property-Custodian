<?php 
include('../config.php');
session_start();
if(!isset($_SESSION["login_user"])){
    header("location:../login.php"); 
}

$accId = $_SESSION['accId'];
$sql = mysqli_query($conn,"SELECT * FROM pc_accounts WHERE accId = $accId ");
$accInfo = mysqli_fetch_array($sql);
if($_SESSION['roleId'] == 2){ // PC CLERK
    header("location:../user_pc_head_admin/dashboard.php");
} else if($_SESSION['roleId'] == 2) { // PC CLERK
    header("location:../user_pc_clerk/dashboard.php");
} else if($_SESSION['roleId'] == 4){ // PC AUDITOR
    header("location:../user_pc_auditor/dashboard.php");
} else if($_SESSION['roleId'] == 5){ // PC ASSISTANT
    header("location:../user_pc_assistant/dashboard.php");
}

$sql = "SELECT * FROM ss_monitoring_facility ";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

if(isset($_GET['submitChanges'])){

}
?>

<!DOCTYPE html>
<html oncontextmenu="return false"  lang="en"> <!-- prevent user from right clicking -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OSAS FACILITY MONITORING REPORT</title>
    <link rel="stylesheet" href="../style/sidebar.css" />
    <link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="../style/main.css" />
    <link rel="stylesheet" href="../style/bootstrap.css" />
    <link rel="stylesheet" href="../style/login.css" />
    <link rel="stylesheet" href="../style/separator.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="icon" type="image/x-icon" href="../assets/images/bcp-logo.png">
</head>
<body>

    <?php include('temps/header.php'); ?>

    <div class="card">
        <div class="card-body">
            <h5 class="separator mb-4">OSAS' - FACILITY MONITORING REPORT</h5>
            <form action="OSAS-Report.php" method="GET">
                <table class="table table-striped table-bordered">
                  <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">DATE</th>
                        <th scope="col">MONITORED OFFICER</th>
                        <th scope="col">SPOT MONITORING</th>
                        <th scope="col">FACILITY</th>
                        <th scope="col">CONCERN</th>
                        <th scope="col">RECEIVED BY</th>
                        <th scope="col">DELIVERY DATE</th>
                        <th scope="col">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($rows as $row)
                    {
                        ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['Date'];?></td>
                            <td><?php echo $row['Monitored_officer'];?></td>
                            <td><?php echo $row['Spot_monitoring'];?></td>
                            <td><?php echo $row['facility'];?></td>
                            <td><?php echo $row['Concern'];?></td>
                            <td>
                                <input type="text" name="receivedBy" value="<?php echo $row['received_by']; ?>">
                            </td>

                            <td>
                                <input type="date" name="date" value="<?php echo $row['Date']; ?>">
                            </td>

                            <td>
                                <input type="text" name="status" value="<?php echo $row['status']; ?>" style="width:6em;">
                            </td>
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                        </tr>
                        <?php
                    }
                    ?>
                </tbody>

            </table>
            <!-- <div>
                <center>
                    <button type="submit" class=" col-5 btn btn-primary mt-5" name="submitChanges">
                        Save Changes
                    </button>
                </center>
            </div> -->
        </form>
    </div>
</div>

<?php include('temps/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
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
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

$sql = "SELECT * FROM pc_accounts JOIN pc_account_status ON pc_accounts.`accountStatus`= pc_account_status.`statusId` JOIN pc_user_role ON pc_accounts.`roleId` = pc_user_role.`roleId` ORDER BY pc_accounts.`accId`";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<html oncontextmenu="return false"  lang="en"> <!-- prevent user from right clicking -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Account Records</title>
    <link rel="stylesheet" href="../style/sidebar.css" />
    <link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="../style/main.css" />
    <link rel="stylesheet" href="../style/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="icon" type="image/x-icon" href="../assets/images/bcp-logo.png">
</head>

<body>
    <?php include('temps/header.php'); ?>
    
    <div class="card">
       <div class="card-body">
        <table class="table table-striped table-bordered">
          <thead>
              <tr>
                <th scope="col">Account ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Department</th>
                <th scope="col">Campus</th>
                <th scope="col">Room#</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rows as $row)
            {
                ?>
                <tr>
                    <td><?php echo $row['accId'];?></td>
                    <td><?php echo $row['firstName'];?></td>
                    <td><?php echo $row['lastName'];?></td>
                    <td><?php echo $row['userEmail'];?></td>
                    <td><?php echo $row['deptName'];?></td>
                    <td><?php echo $row['deptCampus'];?></td>
                    <td><?php echo $row['deptRoom'];?></td>
                    <td><?php echo $row['statusName'];?></td>
                    <td>
                        <a class="btn btn-primary" href="#">View</a>  
                    </td>
                    <?php
                }
                ?>
            </tbody>

        </table>
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
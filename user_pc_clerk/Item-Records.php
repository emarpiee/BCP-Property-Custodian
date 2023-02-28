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

$sql = "SELECT * FROM pc_item_requests JOIN pc_accounts ON pc_item_requests.`requestorId` = pc_accounts.`accId` JOIN pc_items ON pc_item_requests.`itemID` = pc_items.`itemID` LEFT JOIN pc_item_request_status ON pc_item_requests.`statusOfRequestId` = pc_item_request_status.`statusOfRequestId` JOIN pc_item_type ON pc_items.`itemTypeId` = pc_item_type.`itemTypeId`";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<html oncontextmenu="return false"  lang="en"> <!-- prevent user from right clicking -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Item Requests</title>
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
    
    <div class="card position-absolute">
        <div class="card-body">
            <table class="table table-striped table-bordered">
              <thead>
                  <tr>
                    <th scope="col">Request ID</th>
                    <th scope="col">Item</th>
                    <th scope="col">Item Type</th>
                    <th scope="col">Requested By</th>
                    <th scope="col">Department</th>
                    <th scope="col">Room#</th>
                    <th scope="col">Campus</th>
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
                        <td><?php echo $row['requestID'];?></td>
                        <td><?php echo $row['itemName'];?></td>
                        <td><?php echo $row['itemTypeName'];?></td>
                        <td><?php echo $row['firstName'] . " " .$row['lastName'];?></td>
                        <td><?php echo $row['deptName'];?></td>
                        <td><?php echo $row['deptRoom'];?></td>
                        <td><?php echo $row['deptCampus'];?></td>
                        <td>
                            <?php echo $row['itemStatusType'];?>
                        </td>
                        <td>
                            <a class="btn btn-primary mb-2" href="#">View</a>
                        </td>

                    </tr>
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

    //initialize modal
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
      myInput.focus()
  })
</script>
</body>
</html>
<?php 
include('../config.php');
session_start();
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

$sql = "SELECT * FROM pc_item_requests 
JOIN pc_accounts ON pc_item_requests.`requestorId` = pc_accounts.`accId` 
JOIN logistics_warehouse ON pc_item_requests.`itemId` = logistics_warehouse.`stockid` WHERE accId = '$accId'";
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
	<title>My Requests</title>
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
    
    <div class="card m-4">
    <div class="card-header p-3">
      <h2 class="text-center">My Requests</h2>
    </div>
    <div class="card-body">
      <div class="container-fluid">
        <p class="datatable design text-center"></p>
        <div class="row">
          <div class="container">
            <div class="row container-fluid justify-content-center">
            <table class="table table-striped table-bordered">
              <thead>
                  <tr>
                    <th scope="col">REQ. NO</th>
                    <th scope="col">ITEM NAME</th>
                    <th scope="col">QUANTITY</th>
                    <th scope="col">ITEM TYPE</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rows as $row)
                {
                    ?>
                    <tr>
                        <td><?php echo $row['requestID'];?></td>
                        <td><?php echo $row['productname'];?></td>
                        <td><?php echo $row['itemQuantity'];?></td>
                        <td><?php echo $row['category'];?></td>
                        <td>
                            <?php echo $row['statusOfRequest'];?>
                        </td>
                        <td>
                            <?php 
                                if($row['statusOfRequest'] == 'PENDING') {?>
                                    <a class="btn btn-danger mb-2" href="t-Cancel-My-Request.php?requestID=<?php echo $row['requestID']; ?>">CANCEL REQUEST</a>
                                <?php } ?>
                        </td>

                    </tr>
                    <?php
                }
                ?>
            </tbody>

        </table>
              </div>
              <!-- <div class="col-sm"></div> -->
            </div>
          </div>
        </div>
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
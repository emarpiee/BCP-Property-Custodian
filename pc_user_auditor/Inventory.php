<?php
include('../config.php'); 

session_start ();

if(!isset($_SESSION["login_user"])){
  header("location:../login.php"); 
}

$accId = $_SESSION['accId'];
$sql = mysqli_query($conn,"SELECT * FROM pc_accounts WHERE accId = $accId ");
$accInfo = mysqli_fetch_array($sql);
if($_SESSION['userRole'] == 'Property Custodian Head') { // PC CLERK
  header("location:../pc_user_admin/dashboard.php");
} else if($_SESSION['userRole'] == 'Head of the Department'){ //Head Department
  header("location:../pc_user_head_department/dashboard.php");
} else if($_SESSION['userRole'] == 'Property Custodian Clerk'){ // PC AUDITOR
  header("location:../pc_user_clerk/dashboard.php");
} else if($_SESSION['userRole'] == 'Property Custodian Assistant'){ // PC ASSISTANT
  header("location:../pc_user_assistant/dashboard.php");
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Item Records</title>
  <!-- STYLESHEETS -->
  <link rel="stylesheet" href="../style/sidebar.css" />
  <link rel="stylesheet" href="../style/style.css" />
  <link rel="stylesheet" href="../style/main.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="../style/login.css" />
  <link rel="stylesheet" href="../style/separator.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
  <link rel="stylesheet" href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <!-- LOGO -->
  <link rel="icon" type="image/x-icon" href="../assets/images/bcp-logo.png">
  <style type="text/css">
    .btnAdd {
      text-align: right;
      width: 83%;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>

  <!-- CONTENTS -->
  <?php include('item-data-modal.php'); ?>
  <?php include('temps/header.php') ?>
  <div class="card m-4">
    <div class="card-header p-3">
      <h2 class="text-center">Item Inventory</h2>
    </div>
    <div class="card-body">
      <div class="container-fluid">
        <p class="datatable design text-center"></p>
        <div class="row">
          <div class="container">
            <div class="row container-fluid justify-content-center">
              <!-- <div class="col-sm"></div> -->
              <div class="col-md-auto">
                <table id="example" class="table table-hover">
                  <thead>
                    <th>STOCK ID</th>
                    <th>ITEM ID</th>
                    <th>ITEM NAME</th>
                    <th>QUANTITY LEFT</th>
                    <th>CATEGORY</th>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                    <th>STOCK ID</th>
                    <th>ITEM ID</th>
                    <th>ITEM NAME</th>
                    <th>CATEGORY</th>
                  </tfoot>
                </table>
              </div>
              <!-- <div class="col-sm"></div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include('temps/footer.php') ?>
  <!-- CONTENT END -->


  <!-- SCRIPTS -->
  <script src="../script/jquery-3.6.4.min.js" crossorigin="anonymous"></script>
  <script src="../script/bootstrap.bundle.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable({
        "fnCreatedRow": function(nRow, aData, iDataIndex) {
          $(nRow).attr('id', aData[0]);
        },
        'serverSide': 'true',
        'processing': 'true',
        'paging': 'true',
        'order': [],
        'ajax': {
          'url': 'fetch-inventory-data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [4]
        },

        ]
      });
    });

  </script>
</body>

</html>
<script type="text/javascript">
  //var table = $('#example').DataTable();
</script>
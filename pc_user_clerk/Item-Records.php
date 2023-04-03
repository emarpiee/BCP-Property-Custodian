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
} else if($_SESSION['userRole'] == 'Property Custodian Auditor'){ // PC AUDITOR
  header("location:../pc_user_auditor/dashboard.php");
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
      <h2 class="text-center">Item Records</h2>
    </div>
    <div class="card-body">
      <div class="container-fluid">
        <p class="datatable design text-center"></p>
        <div class="row">
          <div class="container">
            <div class="row container-fluid justify-content-center">
              <!-- <div class="col-sm"></div> -->
              <div class="col">
                <table id="example" class="display responsive nowrap table table-hover" style="widows: 100%;">
                  <thead>
                    <th>REQ. NO</th>
                    <th>ITEM NAME</th>
                    <th>REQUESTED BY</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                    <th>REQ. NO</th>
                    <th>ITEM NAME</th>
                    <th>REQUESTED BY</th>
                    <th>STATUS </th>
                    <th>ACTION</th>
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
          'url': 'fetch-item-data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [4]
        },

        ]
      });
    });


    // UPDATE DATA
    $(document).on('submit', '#updateData', function(e) {
      e.preventDefault();
      var requestID = $('#requestIDField').val();
      var itemId = $('#itemId').val();
      var deptName = $('#deptNameField').val();
      var statusOfRequest = $('#statusOfRequestField').val();
      var productname = $('#productnameField').val();
      var itemQuantity = $('#itemQuantityField').val();
      var trid = $('#trid').val();
      var id = $('#id').val();
      if (itemQuantity != '') {
        $.ajax({
          url: "update-item-data.php",
          type: "post",
          data: {
            statusOfRequest: statusOfRequest,
            itemQuantity: itemQuantity,
            id: id
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              table = $('#example').DataTable();
              // table.cell(parseInt(trid) - 1,0).data(id);
              // table.cell(parseInt(trid) - 1,1).data(username);
              // table.cell(parseInt(trid) - 1,2).data(email);
              // table.cell(parseInt(trid) - 1,3).data(mobile);
              // table.cell(parseInt(trid) - 1,4).data(city);
              var button = '<td><a href="javascript:void();" data-id="' + id + '" class="btn btn-primary btn-sm editbtn m-2">Details</a></td>';
              var row = table.row("[id='" + trid + "']");
              row.row("[id='" + trid + "']").data([requestID, productname, deptName, statusOfRequest, button]);
              $('#exampleModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });

    // EDIT - MODAL
    $('#example').on('click', '.editbtn ', function(event) {
      var table = $('#example').DataTable();
      var trid = $(this).closest('tr').attr('id');
      // console.log(selectedRow);
      var id = $(this).data('id');
      $('#exampleModal').modal('show');

      $.ajax({
        url: "get_item_single_data.php",
        data: {
          id: id
        },
        type: 'post',
        success: function(data) {
          var json = JSON.parse(data);
          $('#idField').val(json.accId);
          $('#itemId').val(json.itemId);
          $('#requestIDField').val(json.requestID);
          $('#productnameField').val(json.productname);
          $('#itemQuantityField').val(json.itemQuantity);
          $('#itemMessageField').val(json.itemMessage);
          $('#statusOfRequestField').val(json.statusOfRequest);
          $('#itemTypeField').val(json.itemType);
          $('#descriptionField').val(json.description);
          $('#deptNameField').val(json.deptName);
          $('#deptRoomField').val(json.deptRoom);
          $('#deptCampusField').val(json.deptCampus);
          $('#contactNumberField').val(json.contactNumber);
          $('#userRoleField').val(json.userRole);
          $('#fnameField').val(json.firstName);
          $('#lnameField').val(json.lastName);
          $('#emailField').val(json.userEmail);
          $('#statusField').val(json.accStatus);
          $('#id').val(id);
          $('#trid').val(trid);
        }
      })
    });


    /*// DELETE
    $(document).on('click', '.deleteBtn', function(event) {
      var table = $('#example').DataTable();
      event.preventDefault();
      var id = $(this).data('id');
      if (confirm("Are you sure want to delete this User ? ")) {
        $.ajax({
          url: "delete_user.php",
          data: {
            id: id
          },
          type: "post",
          success: function(data) {
            var json = JSON.parse(data);
            status = json.status;
            if (status == 'success') {
              //table.fnDeleteRow( table.$('#' + id)[0] );
              //$("#example tbody").find(id).remove();
              //table.row($(this).closest("tr")) .remove();
              $("#" + id).closest('tr').remove();
            } else {
              alert('Failed');
              return;
            }
          }
        });
      } else {
        return null;
      }
    })*/

    /*// ADD DATA
    $(document).on('submit', '#addUser', function(e) {
      e.preventDefault();
      var firstName = $('#fnameField').val();
      var lastName = $('#lnameField').val();
      var userEmail = $('#emailField').val();
      var accStatus = $('#statusField').val();
      if (firstName != '' && lastName != '' && userEmail != '' && accStatus != '') {
        $.ajax({
          url: "add_user.php",
          type: "post",
          data: {
            city: city,
            username: username,
            mobile: mobile,
            email: email
          },
          success: function(data) {
            var json = JSON.parse(data);
            var status = json.status;
            if (status == 'true') {
              mytable = $('#example').DataTable();
              mytable.draw();
              $('#addUserModal').modal('hide');
            } else {
              alert('failed');
            }
          }
        });
      } else {
        alert('Fill all the required fields');
      }
    });*/
  </script>
</body>

</html>
<script type="text/javascript">
  //var table = $('#example').DataTable();
</script>
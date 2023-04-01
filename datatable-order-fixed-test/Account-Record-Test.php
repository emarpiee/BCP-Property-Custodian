<?php include('../config.php'); ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Title</title>
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
  <?php include('Data-Modal.php'); ?>
  <?php include('temps/header.php') ?>
  <div class="card m-4">
    <div class="card-body">
      <div class="container-fluid">
        <h2 class="text-center">Account Records</h2>
        <p class="datatable design text-center"></p>
        <div class="row">
          <div class="container">
            <div class="btnAdd">
              <a href="#!" data-id="" data-bs-toggle="modal" data-bs-target="#addUserModal" class="btn btn-primary btn-sm">Add User</a>
            </div>
            <div class="row container-fluid justify-content-center">
              <!-- <div class="col-sm"></div> -->
              <div class="col-sm-auto">
                <table id="example" class="table row-border hover">
                  <thead>
                    <th>ID</th>
                    <th>DEPT. NAME</th>
                    <th>ACCOUNT STATUS</th>
                    <th>ACTIONS</th>
                  </thead>
                  <tbody>
                  </tbody>
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
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="../script/jquery-3.6.4.min.js" crossorigin="anonymous"></script>
  <script src="../script/bootstrap.bundle.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../script/datatables.min.js"></script>
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
          'url': 'fetch_data.php',
          'type': 'post',
        },
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [3]
        },

        ]
      });
    });

    // ADD DATA
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
    });

    // UPDATE DATA
    $(document).on('submit', '#updateData', function(e) {
      e.preventDefault();
      var firstName = $('#fnameField').val();
      var lastName = $('#lnameField').val();
      var userEmail = $('#emailField').val();
      var accStatus = $('#statusField').val();
      var trid = $('#trid').val();
      var id = $('#id').val();
      if (firstName != '' && lastName != '' && userEmail != '' && accStatus != '') {
        $.ajax({
          url: "update_user.php",
          type: "post",
          data: {
            firstName: firstName,
            lastName: lastName,
            userEmail: userEmail,
            accStatus: accStatus,
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
              var button = '<td><a href="javascript:void();" data-id="' + id + '" class="btn btn-info btn-sm editbtn">Details</a>  <a href="#!"  data-id="' + id + '"  class="btn btn-danger btn-sm deleteBtn">Delete</a></td>';
              var row = table.row("[id='" + trid + "']");
              /*row.row("[id='" + trid + "']").data([id, firstName, lastName, userEmail, accStatus, button]);*/
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
        url: "get_single_data.php",
        data: {
          id: id
        },
        type: 'post',
        success: function(data) {
          var json = JSON.parse(data);
          $('#fnameField').val(json.firstName);
          $('#lnameField').val(json.lastName);
          $('#emailField').val(json.userEmail);
          $('#statusField').val(json.accStatus);
          $('#id').val(id);
          $('#trid').val(trid);
        }
      })
    });


    // DELETE
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



    })
  </script>
</body>

</html>
<script type="text/javascript">
  //var table = $('#example').DataTable();
</script>
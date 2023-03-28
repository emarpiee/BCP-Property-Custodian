$(document).ready(function () {
  displayData();
});

function displayData() {
  var displayData = "true";
  $.ajax({
    url: "display.php",
    type: "POST",
    data: {
      displaySend: displayData,
    },
    success: function (data, status) {
      $("#displayDataTable").html(data);
    },
  });
}

function addUser() {
  var firstNameAdd = $("#firstNameAdd").val();
  var lastNameAdd = $("#lastNameAdd").val();
  var emailAdd = $("#emailAdd").val();
  var mobileAdd = $("#mobileAdd").val();
  $.ajax({
    url: "insert.php",
    type: "post",
    data: {
      firstNameSend: firstNameAdd,
      lastNameSend: lastNameAdd,
      emailSend: emailAdd,
      mobileSend: mobileAdd,
    },
    success: function (data, status) {
      displayData();
    },
  });
}

function getUser(updateUserID) {
  $("#hiddenData").val(updateUserID);
  $.post(
    "update.php",
    {
      updateUserID: updateUserID,
    },
    function (data, status) {
      var userID = JSON.parse(data);
      $("#firstNameEdit").val(userID.FirstName);
      $("#lastNameEdit").val(userID.LastName);
      $("#emailEdit").val(userID.Email);
      $("#mobileEdit").val(userID.Mobile);
    }
  );
  $("#updateModal").modal("show");
}

function updateUser() {
  var firstNameEdit = $("#firstNameEdit").val();
  var lastNameEdit = $("#lastNameEdit").val();
  var emailEdit = $("#emailEdit").val();
  var mobileEdit = $("#mobileEdit").val();
  var hiddenData = $("#hiddenData").val();
  $.post(
    "update.php",
    {
      firstNameEdit: firstNameEdit,
      lastNameEdit: lastNameEdit,
      emailEdit: emailEdit,
      mobileEdit: mobileEdit,
      hiddenData: hiddenData,
    },
    function (data, status) {
      displayData();
    }
  );
}

function deleteUser(deleteUserID) {
  $.ajax({
    url: "delete.php",
    type: "post",
    data: {
      deleteSend: deleteUserID,
    },
    success: function (data, status) {
      displayData();
    },
  });
}
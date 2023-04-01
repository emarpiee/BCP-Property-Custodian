$(document).ready(function () {
  displayData();
});

function displayData() {
  var displayData = "true";
  $.ajax({
    url: "Display-Item-Records.php",
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

function getData(updateRequestID) {
  $("#hiddenData").val(updateRequestID);
  $.post(
    "Update-Item-Records.php",
    {
      updateRequestID: updateRequestID
    },
    function (data, status) {
      var reqID = JSON.parse(data);
      $("#updateRequestNo").val(reqID.requestID);
      $("#updateItemName").val(reqID.itemName);
      $("#updateItemQuantity").val(reqID.itemQuantity);
      $("#updateFullName").val(reqID.firstName + " " + reqID.lastName);
      $("#updateDeptName").val(reqID.deptName);
      $("#updateDeptLoc").val("Room " + reqID.deptRoom + ", " + reqID.deptCampus);
    } 
  );
  $("#updateModal").modal("show");
}


function updateData() {
  $("#hiddenData").val(updateRequestID);
  var updateItemQuantity = $("#updateItemQuantity").val();
  $.post(
    "Update-Item-Records.php",
    {
      updateItemQuantity: updateItemQuantity,
      updateRequestID: updateRequestID,
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
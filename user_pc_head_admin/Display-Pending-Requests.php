<?php 
include('../config.php');
/*session_start();
if(!isset($_SESSION["login_user"])){
    header("location:../login.php"); 
}
$accId = $_SESSION['accId'];
$sql = mysqli_query($conn,"SELECT * FROM pc_accounts WHERE accId = $accId ");
$accInfo = mysqli_fetch_array($sql);
if($_SESSION['roleId'] == 2) { // PC CLERK
    header("location:../user_pc_clerk/dashboard.php");
} else if($_SESSION['roleId'] == 3){ //Head Department
    header("location:../user_head_department/dashboard.php");
} else if($_SESSION['roleId'] == 4){ // PC AUDITOR
    header("location:../user_pc_auditor/dashboard.php");
} else if($_SESSION['roleId'] == 5){ // PC ASSISTANT
    header("location:../user_pc_assistant/dashboard.php");
}*/

$sql = "SELECT * FROM pc_item_requests JOIN pc_accounts ON pc_item_requests.`requestorId` = pc_accounts.`accId` JOIN pc_items ON pc_item_requests.`itemID` = pc_items.`itemID` LEFT JOIN pc_item_request_status ON pc_item_requests.`statusOfRequestId` = pc_item_request_status.`statusOfRequestId` JOIN pc_item_type ON pc_items.`itemTypeId` = pc_item_type.`itemTypeId` WHERE pc_item_requests.`statusOfRequestId` = 1 ORDER BY pc_item_requests.`created_at`";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($conn);
?>
        <table class="table table-striped table-bordered">
          <thead>
              <tr>
                <th scope="col">Request ID</th>
                <th scope="col">Item</th>
                <th scope="col">Requested By</th>
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
                    <td><?php echo $row['firstName'] . " " .$row['lastName'];?></td>
                    <td>
                        <?php echo $row['itemStatusType'];?>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm mb-2" href="Approve-Item-Request.php?requestID=<?php echo $row['requestID']; ?>">Approve</a>
                        <a class="btn btn-danger btn-sm mb-2" href="Decline-Item-Request.php?requestID=<?php echo $row['requestID']; ?>">Decline</a>
                    </td>

                </tr>
                <?php
            }
            ?>
        </tbody>

    </table>
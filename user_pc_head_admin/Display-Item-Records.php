<?php
include '../config.php';
if(isset($_POST['displaySend'])){
    $table='<table class="table table-striped table-bordered">
    <thead>
    <tr>
    <th scope="col">REF NO. </th>
    <th scope="col">ITEM NAME</th>
    <th scope="col">REQUESTED BY</th>
    <th scope="col">STATUS</th>
    <th scope="col">ACTION</th>
    </tr>
    </thead>';
    $sql = "SELECT * FROM pc_item_requests JOIN pc_accounts ON pc_item_requests.`requestorId` = pc_accounts.`accId` JOIN pc_items ON pc_item_requests.`itemID` = pc_items.`itemID` LEFT JOIN pc_item_request_status ON pc_item_requests.`statusOfRequestId` = pc_item_request_status.`statusOfRequestId` JOIN pc_item_type ON pc_items.`itemTypeId` = pc_item_type.`itemTypeId` ORDER BY pc_item_requests.`created_at` DESC";
    $result = mysqli_query($conn, $sql);
    $number = 1;
    $statusColor = "";
    while($row = mysqli_fetch_assoc($result)){
        if($row['itemStatusType'] == 1) { // pending
            $statusColor = "btn-outline-success";
        } else if($row['itemStatusType'] == 2) { // cancelled
            $statusColor = "btn-outline-warning";
        } else if($row['itemStatusType'] == 3) { // declined
            $statusColor = "btn-outline-danger";
        } else if($row['itemStatusType'] == 4) { // approved
            $statusColor = "btn-outline-success";
        } else if($row['itemStatusType'] == 5) { // at logistics
            $statusColor = "btn-outline-primary";
        } else if($row['itemStatusType'] == 6) { // out for delivery
            $statusColor = "btn-outline-info";
        } else if($row['itemStatusType'] == 7) { // delivered
            $statusColor = "btn-success";
        }
        $requestID = $row['requestID'];
        $itemName = $row['itemName'];
        $lastName = $row['lastName'];
        $firstName = $row['firstName'];
        $itemStatusType = $row['itemStatusType'];
        $table.='<tr>
        <td scope="row">'.$requestID.'</td>
        <td>'.$itemName.'</td>
        <td>'.$firstName." ".$lastName.'</td>
        <td>'.$itemStatusType.'</td>
        <td class="gap-2">
        <button class="btn btn-primary btn-sm" onclick="getData('.$requestID.')">Details</button>
        </td>
        </tr>';
        $number++;
    } 
    $table.='</table>';
    echo $table;
}
?>
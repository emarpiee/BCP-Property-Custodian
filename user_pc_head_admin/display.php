<?php
include '../config.php';
if(isset($_POST['displaySend'])){
    $table='<table class="table table-striped table-bordered">
    <thead>
    <tr>
    <th scope="col">NO. </th>
    <th scope="col">ITEM NAME</th>
    <th scope="col">REQUEST BY</th>
    <th scope="col">STATUS</th>
    <th scope="col">ACTION</th>
    </tr>
    </thead>';
    $sql = "SELECT * FROM pc_item_requests JOIN pc_accounts ON pc_item_requests.`requestorId` = pc_accounts.`accId` JOIN pc_items ON pc_item_requests.`itemID` = pc_items.`itemID` LEFT JOIN pc_item_request_status ON pc_item_requests.`statusOfRequestId` = pc_item_request_status.`statusOfRequestId` JOIN pc_item_type ON pc_items.`itemTypeId` = pc_item_type.`itemTypeId`";
    $result = mysqli_query($conn, $sql);
    $number = 1;
    while($row = mysqli_fetch_assoc($result)){
        $requestID = $row['requestID'];
        $itemName = $row['itemName'];
        $lastName = $row['lastName'];
        $firstName = $row['firstName'];
        $itemStatusType = $row['itemStatusType'];
        $table.='<tr>
        <td scope="row">'.$number.'</td>
        <td>'.$itemName.'</td>
        <td>'.$firstName." ".$lastName.'</td>
        <td>
        <a class="btn btn-warning disabled btn-sm" role="button text-black">'.$itemStatusType.'</a>
        </td>
        <td class="gap-2">
        <button class="btn btn-primary btn-sm" onclick="getUser('.$requestID.')">Details</button>
        <button class="btn btn-danger btn-sm" onclick="deleteUser('.$requestID.')">Delete</button>
        </td>
        </tr>';
        $number++;
    } 
    $table.='</table>';
    echo $table;
}
?>
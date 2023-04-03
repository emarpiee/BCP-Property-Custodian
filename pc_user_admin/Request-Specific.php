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
} else if($_SESSION['userRole'] == 'Head of the Department'){ //Head Department
  header("location:../pc_user_head_department/dashboard.php");
} else if($_SESSION['userRole'] == 'Property Custodian Auditor'){ // PC AUDITOR
  header("location:../pc_user_auditor/dashboard.php");
} else if($_SESSION['userRole'] == 'Property Custodian Assistant'){ // PC ASSISTANT
  header("location:../pc_user_assistant/dashboard.php");
}

// $sql = "SELECT * FROM pc_items JOIN pc_item_type ON pc_items.`itemTypeId` = pc_item_type.`itemTypeId` WHERE pc_items.`itemTypeId` = 1";
/*$itemCategory = 'consumable';
$sql = "SELECT * FROM logistics_warehouse WHERE quantity > 1 AND category = '$itemCategory'";*/
/*
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);*/


$errorMsg = array('itemSpecific'=> '', 'itemMessage' => '', 'stockid' => '', 'itemQuantity' => '');
$itemCategory = 'item-specific';
$stockid = 0;
$itemMessage = '';
$itemQuantity = 0;
$itemSpecific = '';


if(isset($_GET['requestItem'])){
    // check item name
    if(isset($_POST['itemSpecific'])){
        if(!preg_match('/^[a-zA-Z\s]+$/', $itemSpecific)){
            $errorMsg['itemSpecific'] = 'Message must be letters and spaces only!';
        }
    }
    /*if(empty($_POST['itemSpecific'])){
        $errorMsg['itemSpecific'] = 'Item is required!';
    }else {
        $itemName = $_POST['itemSpecific'];
            // REGEX for letters and spaces only '/^[a-zA-Z\s]+$/'
        if(!preg_match('/^[a-zA-Z\s]+$/', $itemSpecific)){
            $errorMsg['itemSpecific'] = 'Item Name must be letters and spaces only!';
        }

    }*/
    //check textarea
    if(isset($_POST['itemMessage'])){
        if(!preg_match('/^[a-zA-Z\s]+$/', $itemMessage)){
            $errorMsg['itemMessage'] = 'Message must be letters and spaces only!';
        }
    } 
    if($itemQuantity < 0) {
        $errorMsg['itemQuantity'] = 'Invalid number of item!';
    }

    //
    if(array_filter($errorMsg)){
        // error in form
    } else {
        $stockid = 0;
        $itemSpecific = mysqli_real_escape_string($conn, $_GET['itemSpecific']);
        $itemMessage = mysqli_real_escape_string($conn, $_GET['itemMessage']);
        $itemQuantity = mysqli_real_escape_string($conn, $_GET['itemQuantity']);
        $requestorId = $accInfo['accId'];
        $itemType = $itemCategory;
        $sql = "INSERT INTO pc_item_requests (itemType, itemSpecific, itemId, itemMessage, itemQuantity, requestorId) VALUES ('$itemType','$itemSpecific','$stockid', '$itemMessage', '$itemQuantity', '$requestorId') ";
        if(mysqli_query($conn, $sql)){
            $_GET = array();
            $errorMsg = array('itemSpecific'=> '', 'itemMessage' => '', 'stockid' => '', 'itemQuantity' => '');
            $stockid = 0;
            $itemMessage = '';
            $itemQuantity = 0;
            header('location: Request-Specific.php');
        }  else {
                // error
            echo 'query error' . mysqli_error($conn);
        }
    }
    
}
?>

<!DOCTYPE html>
<html>
<html oncontextmenu="return false"  lang="en"> <!-- prevent user from right clicking -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Item Specific Form</title>
    <link rel="stylesheet" href="../style/sidebar.css" />
    <link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="../style/main.css" />
    <link rel="stylesheet" href="../style/bootstrap.css" />
    <link rel="stylesheet" href="../style/login.css" />
    <link rel="stylesheet" href="../style/separator.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="icon" type="image/x-icon" href="../assets/images/bcp-logo.png">
</head>
<body>

    <?php include('temps/header.php'); ?>

    <div class="card">
        <div class="card-header p-3">
            <h2 class="text-center">Request Specific Item</h2>
        </div>  
        <div class="card-body">
            <form action="Request-Specific.php" method="GET">
                <div class="row mb-3 gap-2">
                    <div>
                        <div class="form-floating">
                            <input type="text" class="form-control" placeholder="Item / Product name.." id = "itemSpecific "name="itemSpecific" value="<?php echo htmlspecialchars($itemSpecific); ?>" required>
                            <label for="itemSpecific">Item / Product name..</label>
                            <p class="small text-danger m-auto px-1">
                                <?php echo $errorMsg['itemSpecific']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="mb-3 gap-2" >
                        <div class="form-floating">
                            <input type="number" min = 1 max = 100 class="form-control" id="QTY" name="itemQuantity" placeholder="Quantity" value="<?php echo htmlspecialchars($itemQuantity); ?>" required>
                            <label for="QTY">Quantity</label>
                            <p class="small text-danger m-auto px-1">
                                <?php echo $errorMsg['itemQuantity']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="mb-3 gap-2">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Notes / Message" id="MSG" name="itemMessage" style="resize: none;" value="<?php echo htmlspecialchars($itemMessage); ?>"></textarea>
                            <label for="MSG">Your Report/ Concern here</label>
                            <p class="small text-danger m-auto px-1">
                                <?php echo $errorMsg['itemMessage']; ?>
                            </p>
                        </div>
                    </div>
                    <div>
                        <center>
                            <button type="submit" class=" col-5 btn btn-primary" name="requestItem">
                                Submit
                            </button>
                        </center>
                    </div>
                </div>

            </form>
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
    </script>
</body>
</html>
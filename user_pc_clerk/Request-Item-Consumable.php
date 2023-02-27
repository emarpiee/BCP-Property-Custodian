<?php 
include('../config.php');
session_start();
if(!isset($_SESSION["login_user"])){
    header("location:../login.php"); 
}
$accId = $_SESSION['accId'];
$sql = mysqli_query($conn,"SELECT * FROM pc_accounts WHERE accId = $accId ");
$accInfo = mysqli_fetch_array($sql);
if($_SESSION['roleId'] == 1) { // PC HEAD
    header("location:../user_pc_head_admin/dashboard.php");
} else if($_SESSION['roleId'] == 3){ //Head Department
    header("location:../user_head_department/dashboard.php");
} else if($_SESSION['roleId'] == 4){ // PC AUDITOR
    header("location:../user_pc_auditor/dashboard.php");
} else if($_SESSION['roleId'] == 5){ // PC ASSISTANT
    header("location:../user_pc_assistant/dashboard.php");
}


$errorMsg = array('itemMessage' => '', 'itemName' => '', 'itemQuantity' => '');




$sql = "SELECT * FROM pc_items JOIN pc_item_type ON pc_items.`itemTypeId` = pc_item_type.`itemTypeId` WHERE pc_items.`itemTypeId` = 1"; /*consumables id = 1 */
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<html oncontextmenu="return false"  lang="en"> <!-- prevent user from right clicking -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Title</title>
<link rel="stylesheet" href="../style/sidebar.css" />
<link rel="stylesheet" href="../style/style.css" />
<link rel="stylesheet" href="../style/main.css" />
<link rel="stylesheet" href="../style/bootstrap.css" />
<link rel="stylesheet" href="../style/login.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
<link rel="icon" type="image/x-icon" href="../assets/images/bcp-logo.png">
</head>
<body>

    <?php include('temps/header.php'); ?>

    <div class="card">
        <div class="card-body">
            <form>
                <div class="row mb-3">
                    <div class="col-sm-2">
                        <select class="form-select" aria-label="Item Name" name="item" required>
                            <option value="">Available Items...</option>
                            <?php foreach($rows as $row) :
                               ?>
                               <option value="<?php echo $row['itemName'] ?>"><?php echo $row['itemName'] ?></option>
                           <?php endforeach; ?>
                                  <!-- <option value="">Choose Item Type...</option>
                                  <option value="MV Campus">BCP MV Campus</option>
                                  <option value="Main Campus">BCP Main Campus</option>
                                  <option value="San Agustin Campus">BCP San Agustin Campus</option>
                                  <option value="Bulacan Campus">BCP Bulacan Campus</option>
                                  <option value="Marine Campus">BCP Marine Campus</option> -->
                              </select>
                              <p class="small text-danger m-auto px-1">
                                <!-- <?php echo $errorMsg['itemName']; ?> -->
                            </p>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-floating">
                              <input type="number" min = 1 max = 500 class="form-control" id="QTY" name="itemQuantity" placeholder="Quantity"value="<?php echo htmlspecialchars($itemQuantity); ?>" required>
                              <label for="QTY">Quantity</label>
                              <p class="small text-danger m-auto px-1">
                                <!-- <?php echo $errorMsg['itemQuantity']; ?> -->
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Notes / Message" id="MSG"></textarea>
                          <label for="MSG">Notes / Message</label>
                      </div>
                  </div>
                  <div class="col">
                    <button type="submit" class=" col-5 btn btn-primary" name="requestItem">
                        Submit
                    </button>
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
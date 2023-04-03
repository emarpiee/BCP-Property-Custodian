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

// validate form

$email = $password = $firstName = $middleName = $lastName = $deptName = $deptCampus = "";
$deptRoom = $contactNumber = 0;
$errorMsg = array('email' => '', 'password' => '', 'firstName' => '', 'middleName' => '', 'lastName' => '', 'deptName' => '', 'deptCampus' => '', 'deptRoom' => '', 'contactNumber' => '');

if(isset($_POST['register'])){

    // check email
    if(empty($_POST['email'])){
        $errorMsg['email'] = 'Email is required <br />';
    } else {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errorMsg['email'] = 'Email must be a valid email address';
        } else {
            // check email if already exists in database
            $checkIfExist = "SELECT * FROM pc_accounts WHERE userEmail = '$email'";
            $result = mysqli_query($conn, $checkIfExist);
            if(mysqli_num_rows($result)){
                $errorMsg['email'] = 'Email already exists!';
            }
        }
    }

    // check passsowrd
    if(empty($_POST['password'])){
        $errorMsg['password'] = 'Password is required <br />';
    } else {
        $password = $_POST['password'];
        if(strlen($password) < 8 && strlen($password) >= 128){
            $errorMsg['password'] = 'Password must be 8 characters long!';
        }
    }

    // check firstname
    if(empty($_POST['firstName'])){
        $errorMsg['firstName'] = 'Firstname is required!';
    }else {
        $firstName = $_POST['firstName'];
            // REGEX for letters and spaces only '/^[a-zA-Z\s]+$/'
        if(!preg_match('/^[a-zA-Z\s]+$/', $firstName)){
            $errorMsg['firstName'] = 'Firstname must be letters and spaces only!';
        }

    }

    // check last name
    if(empty($_POST['lastName'])){
        $errorMsg['lastName'] = 'Lastname is required!';
    }else {
        $lastName = $_POST['lastName'];
            // REGEX for letters and spaces only '/^[a-zA-Z\s]+$/'
        if(!preg_match('/^[a-zA-Z\s]+$/', $lastName)){
            $errorMsg['lastName'] = 'Lastname must be letters and spaces only!';
        }

    }

    // check department name
    if(empty($_POST['deptName'])){
        $errorMsg['deptName'] = 'Department name is required!';
    }else {
        $deptNameRaw = rtrim($_POST['deptName']);
        $deptName = strtoupper($deptNameRaw);
            // REGEX for letters and spaces only '/^[a-zA-Z\s]+$/'
        if(!preg_match('/^[a-zA-Z\s]+$/', $deptName)){
            $errorMsg['deptName'] = 'Department name must be letters and spaces only!';
        } else {
            // check if dept already exists in database
            $checkIfExist2 = "SELECT * FROM pc_accounts WHERE deptName = '$deptName'";
            $result2 = mysqli_query($conn, $checkIfExist2);
            if(mysqli_num_rows($result2)){
                $errorMsg['deptName'] = 'Department already exists!';
            }
        }

    }



    // check department room number
    if(empty($_POST['deptRoom'])){
        $errorMsg['deptRoom'] = 'Department Room is required!';
    } else if(is_int($_POST['deptRoom'])){
        $deptRoom = $_POST['deptRoom'];
        if($deptRoom <= 100 && $deptRoom >= 551){
            $errorMsg['deptRoom'] = 'Room not found!';
        }
    }

    // check contact number
    if(is_int($_POST['contactNumber'])){
        $contactNumber = $_POST['contactNumber'];
        if($contactNumber < 10 && $contactNumber > 13){
            $errorMsg['contactNumber'] = 'Invalid contact number!';
        }
    }

    // executes if any errors found in form
    if(array_filter($errorMsg)){
        // error
    } else {
        // valid form
        // escapes sepcial characters
        $userRole = 'Head of the Department';
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $deptName = strtoupper(mysqli_real_escape_string($conn, $_POST['deptName']));
        $deptCampus = mysqli_real_escape_string($conn, $_POST['deptCampus']);
        $deptRoom = $_POST['deptRoom'];
        $contactNumber = $_POST['contactNumber'];

        // if no errors in form, insert data account table
        $insertData = "INSERT INTO pc_accounts (userEmail, userPass, firstName, middleName, lastName, deptName, deptCampus, deptRoom, contactNumber, userRole) VALUES ('$email', '$password', '$firstName', '$middleName', '$lastName', '$deptName', '$deptCampus', '$deptRoom', '$contactNumber', '$userRole')";

        if(mysqli_query($conn, $insertData)){
            $_POST = array();
            $email = $password = $firstName = $middleName = $lastName = $deptName = $deptCampus = "";
            $deptRoom = $contactNumber = 0;
            $errorMsg = array('email' => '', 'password' => '', 'firstName' => '', 'middleName' => '', 'lastName' => '', 'deptName' => '', 'deptCampus' => '', 'deptRoom' => '', 'contactNumber' => '');
            header("location:Account-Records.php");

        }  else {
                // error
            echo 'query error' . mysqli_error($conn);
        }

    }

}

?>
<!DOCTYPE html>
<html oncontextmenu="return false"  lang="en"> <!-- prevent user from right clicking -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Department | Admin</title>
    <link rel="stylesheet" href="../style/sidebar.css" />
    <link rel="stylesheet" href="../style/style.css" />
    <link rel="stylesheet" href="../style/main.css" />
    <link rel="stylesheet" href="../style/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../style/separator.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="icon" type="image/x-icon" href="../assets/images/bcp-logo.png">
</head>
<body>


    <?php include('temps/header.php'); ?>

    <div class="card">
        <div class="card-header p-3">
            <h2 class="text-center">Department Registration Form</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <?php include('forms/Account-Form.php') ?>
                <div class="row justify-content-center gap-5">
                    <button type="submit" class=" col-5 btn btn-primary" name="register">
                        Submit
                    </button>
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
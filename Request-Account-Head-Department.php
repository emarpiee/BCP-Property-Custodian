<?php 
include('config.php');

$roleId = 3; // role ID of head department
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

	// check middle name
	if(!preg_match('/^[a-zA-Z\s]+$/', $_POST['middleName'])){
		$errorMsg['middleName'] = 'Middle name must be letters and spaces only!';
	} else {
		$middleName = $_POST['middleName'];
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
		$deptName = rtrim($_POST['deptName']);
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

	// check campus
	if(empty($_POST['deptCampus'])){
		$errorMsg['deptCampus'] = 'Department campus is required!';
	}else {
		$deptCampus = $_POST['deptCampus'];
			// REGEX for letters and spaces only '/^[a-zA-Z\s]+$/'
		if(!preg_match('/^[a-zA-Z\s]+$/', $deptCampus)){
			$errorMsg['deptCampus'] = 'Department campus must be letters and spaces only!';
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
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$password = mysqli_real_escape_string($conn, $_POST['password']);
		$firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
		$middleName = mysqli_real_escape_string($conn, $_POST['middleName']);
		$lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
		$deptName = mysqli_real_escape_string($conn, $_POST['deptName']);
		$deptCampus = mysqli_real_escape_string($conn, $_POST['deptCampus']);
		$deptRoom = $_POST['deptRoom'];
		$contactNumber = $_POST['contactNumber'];

		// if no errors in form, insert data account table
		$insertData = "INSERT INTO pc_accounts (userEmail, userPass, firstName, middleName, lastName, deptName, deptCampus, deptRoom, contactNumber, roleId) VALUES ('$email', '$password', '$firstName', '$middleName', '$lastName', '$deptName', 'deptCampus', '$deptRoom', '$contactNumber', '$roleId')";

		if(mysqli_query($conn, $insertData)){
			$_POST = array();
			$email = $password = $firstName = $middleName = $lastName = $deptName = $deptCampus = "";
			$deptRoom = $contactNumber = 0;
			$errorMsg = array('email' => '', 'password' => '', 'firstName' => '', 'middleName' => '', 'lastName' => '', 'deptName' => '', 'deptCampus' => '', 'deptRoom' => '', 'contactNumber' => '');
			echo "ACCOUN REQUEST SUBMITTED TO THE BCP PROPERTY CUSTODIAN DEPARTMENT";
			
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
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Register an Account</title>
	<link rel="stylesheet" href="style/main.css" />
	<link rel="stylesheet" href="style/bootstrap.css" />
	<link rel="stylesheet" href="style/login.css" />
	<link rel="stylesheet" type="text/css" href="style/separator.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
	<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
	<link rel="icon" type="image/x-icon" href="assets/images/bcp-logo.png">
	<style>
		.custom-tooltip {
			--bs-tooltip-bg: var(--bs-secondary);
		}
	</style>
</head>
<body>
	<div class="loginContainer">
		<div class="d-lg-flex position-relative">
			<div class="d-flex logoContainer">
				<div class="polygon1 position-relative">
					<img class="logo" src="assets/images/bcp-logo.png" alt="bcp-logo" />
				</div>
				<div class="polygon2"></div>
			</div>
			<div class="form-container d-flex justify-content-center align-items-center p-1 p-lg-4">
				<div class="mt-1 px-5">
					<div class="form-header1 ps-2 mb-5">
						<h1 class="header1 fw-bold fs-1 m-0">BCP</h1>
						<h1 class="header2 fw-bold fs-2 m-0">PROPERTY CUSTODIAN</h1>
					</div>

					<h5 class="separator mb-4">Head of the Department Registration Form</h5>
					<!-- REGISTRATION FORM -->
					<form method="POST" action="Request-Account-Head-Department.php">
						<?php include('forms/Account-Form.php'); ?>
						<div class="row justify-content-center gap-5">
							<button type="submit" class=" col-5 btn btn-primary" name="register">
								Submit
							</button>
							<a class="col-5 btn btn-outline-secondary" href="login.php" role="button">Login Instead</a>
						</div>
					</form>
					<span class="loginLineBreak my-4"></span>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script>

        //password eye button
		let showPassword = document.querySelector("#passwordIconId");
		const passwordField = document.querySelector("#inputPassword");
		showPassword.addEventListener("click", function() {
			this.classList.toggle("fa-eye");
			const type =
			passwordField.getAttribute("type") === "password" ?
			"text" : "password";
			passwordField.setAttribute("type", type);
		});

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
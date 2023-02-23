<?php
require("config.php"); 
session_start ();
if(isset($_POST['submit']))
{
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$pass = mysqli_real_escape_string($conn,$_POST['password']); 
	$statusId = 2; //1 = PENDING, 2 = ACTIVE, 3 = ARCHIVED

	//check if email and pass is in database, if so, store that array of data in a variable
	$sql = mysqli_query($conn,"SELECT * FROM pc_accounts INNER JOIN pc_account_status ON pc_accounts.`accountStatus` = pc_account_status.`statusId` WHERE userEmail='$email' AND userPass='$pass' AND statusId = '$statusId'");
	$result=mysqli_fetch_array($sql);
	
	if($result)
	{
		$accId = $result['accId'];
		$sql2 = mysqli_query($conn, "SELECT * FROM pc_accounts
INNER JOIN pc_user_role
ON pc_accounts.`roleId` = pc_user_role.`roleId` WHERE accId = '$accId' ");
		$result2 = mysqli_fetch_array($sql2);
		$roleId = $result2['roleId'];
		if ($roleId == 1){ // REDIRECT TO PC HEAD / ADMIN DASHBOARD
			$_SESSION['roleId'] = $roleId;
			$_SESSION['accId'] = $result['accId'];
			$_SESSION["login_user"]="1";
			header("location:user_pc_head_admin/dashboard.php");
		}
		else if ($roleId == 2) { // REDIRECT TO PC CLERK DASHBOARD
			$_SESSION['roleId'] = $roleId;
			$_SESSION['accId'] = $result['accId'];
			$_SESSION["login_user"]="1";
			header("location:user_pc_clerk/dashboard.php");
		} else if ($roleId == 3){ // REDIRECT TO OTHER HEAD DEPARTMENT DASHBOARD
			$_SESSION['roleId'] = $roleId;
			$_SESSION['accId'] = $result['accId'];
			$_SESSION["login_user"]="1";
			header("location:user_head_department/dashboard.php");
		} else if ($roleId == 4){ // REDIRECT TO PC AUDITOR DASHBOARD
			$_SESSION['roleId'] = $roleId;
			$_SESSION['accId'] = $result['accId'];
			$_SESSION["login_user"]="1";
			header("location:user_pc_auditor/dashboard.php");
		}	else if ($roleId == 5){ // REDIRECT TO PC ASSISTANT DASHBOARD
			$_SESSION['roleId'] = $roleId;
			$_SESSION['accId'] = $result['accId'];
			$_SESSION["login_user"]="1";
			header("location:user_pc_assistant/dashboard.php");
		}
		
	}
	else	
	{
		$msg = 'Invalid login credentials, try again.';
		header("location:login.php?err=".$msg);

	}
	mysqli_free_result($result);
	mysqli_free_result($result2);
	mysqli_close($conn);
}

/*
	if(isset($_REQUEST['submit']))
	{
		$uEmail = mysqli_real_escape_string($conn,$_POST['email']);
		$uPass = $_REQUEST['password'];

		$res = mysqli_query($conn,"SELECT * FROM pc_accounts where userEmail='$uEmail'and userPass='$uPass'");
		$result=mysqli_fetch_array($res);
		if($result)
		{

			$_SESSION["login"]="1";
			header("location:homeTest.php");
		}
		else	
		{
			header("location:login.php?err=1");

		}
	}

/*if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 

	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']); 

	$sql = "SELECT * FROM pc_accounts WHERE userEmail = '$email' and userPass = '$password'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);


	$count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

	if($count == 1) {

		$_SESSION['login_user'] = $email;

		header("location: homeTest.php");
	}else	
	{
		header("location:login.php?err=1");

	}
}
*/

?>
<?php
require("config.php"); 
session_start ();
if(isset($_POST['submit']))
{
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$pass = mysqli_real_escape_string($conn,$_POST['password']); 
	$accStatus = 'ACTIVE'; 
	//check if email and pass is in database, if so, store that array of data in a variable
	$sql = mysqli_query($conn,"SELECT * FROM pc_accounts WHERE userEmail='$email' AND userPass='$pass' AND accStatus = '$accStatus'");
	$result=mysqli_fetch_array($sql);
	
	if($result)
	{
		$accId = $result['accId'];
		$userRole = $result['userRole'];
		/*$roleId = $result['accId'];*/
		if ($userRole == 'Property Custodian Head'){ // REDIRECT TO PC HEAD / ADMIN DASHBOARD
			$_SESSION['userRole'] = $userRole;
			$_SESSION['accId'] = $result['accId'];
			$_SESSION["login_user"]="1";
			header("location:pc_user_admin/dashboard.php");
		}
		else if ($userRole == 'Property Custodian Clerk') { // REDIRECT TO PC CLERK DASHBOARD
			$_SESSION['userRole'] = $userRole;
			$_SESSION['accId'] = $result['accId'];
			$_SESSION["login_user"]="1";
			header("location:pc_user_clerk/dashboard.php");
		} else if ($userRole == 'Head of the Department'){ // REDIRECT TO OTHER HEAD DEPARTMENT DASHBOARD
			$_SESSION['userRole'] = $userRole;
			$_SESSION['accId'] = $result['accId'];
			$_SESSION["login_user"]="1";
			header("location:pc_user_head_department/dashboard.php");
		} else if ($userRole == 'Property Custodian Auditor'){ // REDIRECT TO PC AUDITOR DASHBOARD
			$_SESSION['userRole'] = $userRole;
			$_SESSION['accId'] = $result['accId'];
			$_SESSION["login_user"]="1";
			header("location:pc_user_auditor/dashboard.php");
		}	else if ($userRole == 'Property Custodian Assistant'){ // REDIRECT TO PC ASSISTANT DASHBOARD
			$_SESSION['userRole'] = $userRole;
			$_SESSION['accId'] = $result['accId'];
			$_SESSION["login_user"]="1";
			header("location:pc_user_assistant/dashboard.php");
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
<?php
include("config.php"); 
session_start ();

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



	if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST")
	{
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$pass = mysqli_real_escape_string($conn,$_POST['password']); 

		$sql = mysqli_query($conn,"SELECT * FROM pc_accounts where userEmail='$email'and userPass='$pass'");
		$result=mysqli_fetch_array($sql);
		if($result)
		{

			$_SESSION['firstname'] = $result['firstName'];
			$_SESSION["login_user"]="1";
			header("location:homeTest.php");
		}
		else	
		{
			header("location:login.php?err=1");

		}
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
?>*/
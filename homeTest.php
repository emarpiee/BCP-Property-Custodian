<?php 
session_start ();
if(!isset($_SESSION["login_user"])){
	header("location:login.php"); 
}
?>



<h1>Hey ! welcome to main page .</h1>
<?php echo "Hello" . $_SESSION['firstname']; ?>
<a href="logout.php"><h2><font color="red">Logout</font></h2>
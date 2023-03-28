<?php
include 'connect.php';
extract($_POST);
if(isset($_POST['firstNameSend']) && isset($_POST['lastNameSend']) 
&& isset($_POST['emailSend'])&& isset($_POST['mobileSend']))
{
    $sql="insert into `users` (FirstName, LastName, Email, Mobile) 
    values ('$firstNameSend','$lastNameSend','$emailSend','$mobileSend')";
    $result = mysqli_query($con, $sql);
}
?>
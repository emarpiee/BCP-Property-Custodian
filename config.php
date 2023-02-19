<?php

  // stores the absolute path pf config.php in current directory, use for checking file's current directory
$current_dir = realpath("config.php");

  // stores absolute path of config.php in my LOCALHOST
$localhost_dir = "C:\\xampp\htdocs\Projects\BCPPropertyCustodian\config.php";


if($current_dir == $localhost_dir){
    //execute if the current working directory is in LOCALHOST

    $DB_SERVER = "localhost";
    $DB_USER = "mark";
    $DB_PASS = "";
    $DB_NAME = "pc_db";

  // Create connection
    $conn = new mysqli($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);

  // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {

  // test success output
      echo "<div class='container'>
      <center>
      <p class ='p-3 mb-2 bg-success text-white' style='font-family: Lucida Console;'>
      Database Local Connection Success!
      </p>
      </center>

      </div>";
  }     

} else {
    //execute if the current working directory is in ANOTHER HOST

    $DB_SERVER = "127.0.0.1:3306";
    $DB_USER = "u476821515_mrkrynp";
    $DB_PASS = "BCPsms2022";
    $DB_NAME = "u476821515_pc_testDb";

  // Create connection
    $conn = new mysqli($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);

  // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {

  // test success output
      echo "<div class='container'>
      <center>
      <p class ='p-3 mb-2 bg-success text-white' style='font-family: Lucida Console;'>
      Database Connection Success!
      </p>
      </center>

      </div>";
  }
}

?>

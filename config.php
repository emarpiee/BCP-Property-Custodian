<?php

if($_SERVER = 'localhost'){
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
    }
}

?>

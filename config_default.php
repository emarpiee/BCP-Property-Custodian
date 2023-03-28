<?php

if($_SERVER['HTTP_HOST'] == 'localhost'){
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

    $DB_SERVER = "217.21.88.1";
    $DB_USER = "u476821515_SMS";
    $DB_PASS = "Bcpsms12@";
    $DB_NAME = "u476821515_SMS";

  // Create connection
    $conn = new mysqli($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);

  // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}

?>
<?php
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
  echo "Connected successfully";
?>
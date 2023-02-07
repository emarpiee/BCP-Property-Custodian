<?php
  $DB_SERVER = "localhost";
  $DB_USER = "mark";
  $DB_PASS = "";
  $DB_NAME = "pc_db";

  // Create connection
  $conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);

  // Check connection
  if (mysqli_connect_error()) {
    die("Database connection failed: " . mysqli_connect_error());
}
  echo "Connected successfully";
?>
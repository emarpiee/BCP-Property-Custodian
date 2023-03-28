<?php
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
?>

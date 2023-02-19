<?php
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

?>

<div class="container">
  <center>
    <p class ="p-3 mb-2 bg-success text-white" style="font-family: Lucida Console;">
      <?php echo 'Database Connection Success!'; ?>
    </p>
  </center>

</div>
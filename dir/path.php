<?php

  // stores config.php current directory, use only if using two hosts atsm
  $current_dir = realpath("path.php");

  // absolute path of config.php in my localhost
  $localhost_dir = "C:\\xampp\htdocs\Projects\BCPPropertyCustodian\dir\path.php";

  if($current_dir == $localhost_dir){
    echo "success";
  } else {
    echo "failed";
  }
?>

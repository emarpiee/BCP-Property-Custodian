<?php
$con = new mysqli('localhost', 'mark', '', 'test1');
if(! $con) {
    The(mysqli_error($con));
}
?>
<?php
echo "hello";
$dbcon = mysqli_connect('localhost','cs425','a','425');
mysqli_select_db($dbcon,"users");
?>

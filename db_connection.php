<?php
$dbcon = mysqli_connect('localhost','cs425','a','425');
if (!$dbcon) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
// echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
// echo "Host information: " . mysqli_get_host_info($dbcon) . PHP_EOL;
/*if(!mysqli_select_db($dbcon,"users")) {
  echo "Failed to set the database \"users\"";
  exit;
}*/
?>

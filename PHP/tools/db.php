<?php 
// db.php - Oracle Database Connection

$username = "system";  // Your Oracle username
$password = "root";   // Your Oracle password
$connection_string = "//localhost:1521/XE";  // Format: //host:port/service_name

// Create connection
$con = oci_connect($username, $password, $connection_string);

// Check connection with detailed error
if (!$con) {
    $error = oci_error();
    die("Connection failed: " . htmlentities($error['message']));
}
?>
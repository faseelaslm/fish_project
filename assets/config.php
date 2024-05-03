<?php
$hostName = "localhost"; // host name
$username = "root";  // database username
$password = ""; // database password
// $password = "123456"; // database password
$databaseName = "project"; // database name

$connection = new mysqli($hostName,$username,$password,$databaseName);
mysqli_set_charset($connection,'utf8');
if (!$connection) {
    die("Error in database connection". $connection->connect_error);
}
?>
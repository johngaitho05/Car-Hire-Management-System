<?php
$host = "localhost";
$userName = "root";
$password = "";
$dbName = "mydatabase";
 
// Create database connection
$mysqli = new mysqli($host, $userName, $password, $dbName);
 
// Check connection
if ($mysqli->connect_error) {
die("Connection failed: " . $mysqli->connect_error);
}
?>
<?php
$localh= "127.0.0.1";
$username = "root";
$password = "";
$dbName= "sibolpinoy";

//create connection
$conn = new mysqli($localh, $username, $password, $dbName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>
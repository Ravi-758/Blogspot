<?php
date_default_timezone_set('Asia/Kolkata');
session_start();

$servername = "localhost";
$username = "root";
$db = "blogSpot";
$password = "123456789";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>

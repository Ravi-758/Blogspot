<?php
date_default_timezone_set('Asia/Kolkata');
session_start();

// $servername = "localhost";
// $username = "root";
// $db = "blogSpot";
// $password = "123456789";

// $servername="127.0.0.1";
// $db="u765052536_lmjlara";
// $username="u765052536_lmjlara";
// $password="Laralappa@121";

$servername="127.0.0.1";
$db="blogspot";
$username="root";
$password="";

// Create connection
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_SESSION['alert'])){
    if($_SESSION['alert'] != ''){
        echo('<script>alert("'.$_SESSION['alert'].'")</script>');
        $_SESSION['alert'] = '';
    }
}

if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];

    $result9 = $conn->query("Select * from users WHERE email = '$email'");

    if ($result9->num_rows > 0) {
        while($row = $result9->fetch_assoc()) {
            $name=$row['name'];
            $user_id = $row['id'];
        }
    }
}

?>


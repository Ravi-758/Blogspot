<?php
include('../../master/conn.php');
include('../../components/mail.php');

if(isset($_SESSION['alert'])){
    if($_SESSION['alert'] != ''){
        echo('<script>alert("'.$_SESSION['alert'].'")</script>');
        $_SESSION['alert'] = '';
    }
}

if(isset($_SESSION['logged_in'])){
    if($_SESSION['logged_in'] == 'true'){
        header('Location: http://localhost/Github/Blogspot/index.php');
    }
}

$token = $_GET['token'];
$email = $_GET['email'];
$now =  date("Y/m/d H:i:s");

    $sql = "Select * from users WHERE email = '$email' AND token = '$token'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row['token'] == $token AND $row['token'] > $now){
                $conn->query("UPDATE users set email_verified_at = '$now' WHERE email = '$email'");
                $_SESSION['logged_in'] = 'true';       
                $_SESSION['email'] = $email;
                header('Location: http://localhost/Github/Blogspot/index.php');
            }
            else{
                echo('<script>alert("Your token has been expired please regenerate.")</script>');
            }
        }
    } else {
        echo('<script>alert("This is not a valid link")</script>');
    }
   

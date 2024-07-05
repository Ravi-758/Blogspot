<?php

if(isset($_SESSION['logged_in'])){
    if($_SESSION['logged_in'] != 'true'){
        $_SESSION['alert'] = "Please log in first 🥺";
        header('Location: http://localhost/blogspot/user/auth/login.php');
    }
}else{
     $_SESSION['alert'] = "Please log in first 🥺";
        header('Location: http://localhost/blogspot/user/auth/login.php');
}
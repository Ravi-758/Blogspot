<?php
include('../master/conn.php');
if(isset($_SESSION['logged_in'])){
    if($_SESSION['logged_in'] != 'true'){
        header('Location: http://localhost/Github/Blogspot/user/auth/login.php');
    }
}
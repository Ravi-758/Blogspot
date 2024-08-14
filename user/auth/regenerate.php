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
        header('Location: http://localhost/blogspot/index.php');
    }
}

if(isset($_POST['submit'])){
    $name = $_GET['name'];
    $email = $_GET['email'];
    
    $token= uniqid();
    $link = 'http://localhost/blogspot/user/auth/verify.php?token='.$token.'&email='.$email;
    $thirtyMinutes = date("Y/m/d H:i:s", strtotime("+30 minutes"));

    $sql = "UPDATE users set token = '$token', token_valid_till = '$thirtyMinutes' WHERE email = '$email'";

    if ($conn->query($sql) === TRUE) {
        sendMail($email, $name, $link);
        echo('<script>alert("New verification mail has been sent to your email.")</script>');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/components.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>BlogSpot | Login page</title>
</head>
<body>
    <section id="auth">
        <form action="" method="POST">
            
            <h1>BlogSpot</h1>
            <h2>We have sent you a verification email</h2>
            <br>
            Please verify your email before login or try resending verification email.
            <br>
            <br>
            Go to <a href="https://localhost/blogspot/user/auth/login.php">login</a> page.
            <button class="__btn" name="submit" type="submit">Resend Email Verification</button>
        </form>
    </section>
</body>
</html>
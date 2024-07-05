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
    $email = $_POST['email'];
    
    $token= uniqid();
    $link = 'http://localhost/blogspot/user/auth/reset-password.php?token='.$token.'&email='.$email;
    $thirtyMinutes = date("Y/m/d H:i:s", strtotime("+30 minutes"));

    $result = $conn->query("Select * from users1 WHERE email = '$email'");
    if ($result->num_rows < 0) {
        echo('<script>alert("This email is not registered with us, please create a new account.")</script>');
    } else {
         $sql = "UPDATE users1 set token = '$token', token_valid_till = '$thirtyMinutes' WHERE email = '$email'";

        if ($conn->query($sql) === TRUE) {
            sendMail($email, '', $link);
            $_SESSION['alert'] = 'A reset token has been sent to your email please check your email';
            header('Location: login.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
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
            <p style="margin-top:1rem">Enter your email to get password reset token</->
            <div class="form-input">
                <label for="">Email</label>
                <input class="w-full" type="text" name="email"  placeholder="Email id" required/>
            </div>
            <a href="login.php">login?</a>

           
            <button class="__btn" name="submit" type="submit">Submit</button>
        </form>
    </section>
</body>
</html>
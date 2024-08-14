<?php
include('../../master/conn.php');

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
    $password = $_POST['password'];

    $result = $conn->query("Select * from users WHERE email = '$email' AND password = '$password' AND email_verified_at != ''");
    
    if ($result->num_rows > 0) {
        $_SESSION['logged_in'] = 'true';
        $_SESSION['email'] = $email;

        $_SESSION['alert'] = 'Login successfull';

        header('Location: http://localhost/blogspot/index.php');
    } else {
        $result1 = $conn->query("Select * from users WHERE email = '$email' AND password = '$password'");
        if ($result1->num_rows > 0) {
            header('Location: http://localhost/blogspot/user/auth/regenerate.php?name='.$name.'&email='.$email.'');
        }else{
            $_SESSION['alert'] = 'Wrong credentials';
    
            header("Refresh:0");
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
        <form action="" method="GET">
            <h1>BlogSpot</h1>
            <p>Login Form</p>

            <div class="form-input">
                <label for="">Email</label>
                <input type="text" name="email"  placeholder="Email id" required/>
            </div>
            <div class="form-input">
                <label for="">Password</label>
                <input type="password" name="password" placeholder="password" required/>
            </div>
            <div class="flex">
                <a href="forgot-password.php">forgot password?</a>
                <a href="register.php">Register</a>
            </div>
            <button class="__btn" name="submit" type="submit">Submit</button>
        </form>
    </section>
</body>
</html>
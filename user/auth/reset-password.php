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
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/components.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>BlogSpot | Password Reset</title>
</head>
<body>
    <section id="auth">
        <form action="" method="POST">
            <div class="form-input">
                <label for="">Email</label>
                <input type="text" name="email"  placeholder="Email id" value="<?php $_GET['email']?> " required/>
            </div>
            <div class="form-input">
                <label for="">Password</label>
                <input type="text" name="password" placeholder="password" required/>
            </div>
            <div class="form-input">
                <label for="">Password</label>
                <input type="text" name="password" placeholder="password" required/>
            </div>
            <a href="forgot-password.php">forgot password?</a>
            <button class="__btn" name="submit" type="submit">Submit</button>
        </form>
    </section>
</body>
</html>
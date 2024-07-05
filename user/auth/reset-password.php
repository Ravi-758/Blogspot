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

$token = $_GET['token'];
$email = $_GET['email'];

if(isset($_POST['submit'])){
    
$password= $_POST['password'];
$now =  date("Y/m/d H:i:s");

    $sql = "Select * from users1 WHERE email = '$email' AND token = '$token'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row['token'] == $token AND $row['token'] > $now){
                $conn->query("UPDATE users1 set password = '$password' WHERE email = '$email'");
                $_SESSION['logged_in'] = 'true';       
                $_SESSION['email'] = $email;
                $_SESSION['alert'] = 'Password reset successfully';
                header('Location: http://localhost/blogspot/index.php');
            }
            else{
                echo('<script>alert("Your token has been expired please regenerate.")</script>');
            }
        }
    } else {
        echo('<script>alert("This is not a valid link")</script>');
    }
};
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
            
            <h1>BlogSpot</h1>
            <div class="form-input">
                <label for="">Email</label>
                <input type="text" name="email"  placeholder="Email id" value="<?= $email?>" required/>
            </div>
            <div class="form-input">
                <label for="">New assword</label>
                <input type="password" name="password" placeholder="password" required/>
            </div>
            <a href="forgot-password.php">forgot password?</a>
            <button class="__btn" name="submit" type="submit">Submit</button>
        </form>
    </section>
</body>
</html>
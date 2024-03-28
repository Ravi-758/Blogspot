<?php
include('../../master/conn.php');
include('../../components/mail.php');

if(isset($_POST['submit'])){

    $token = 'https://localhost/user/auth/verify?token='.uniqid();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password,token,token_created_at) VALUES ('$name', '$email', '$password','$token',now())";

    if ($conn->query($sql) === TRUE) {
        sendMail($email, 'Jassa', $token);
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
            <div class="form-input">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" placeholder="Name"/>
            </div>
            <div class="form-input">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" placeholder="Email id"/>
            </div>
            <div class="form-input">
                <label for="password">Password</label>
                <input id="password" type="text" name="password" placeholder="password"/>
            </div>
            <button class="__btn" name="submit" type="submit">Submit</button>

        </form>
    </section>
</body>
</html>
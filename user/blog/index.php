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
    if($_SESSION['logged_in'] != 'true'){
        header('Location: http://localhost/Github/Blogspot/index.php');
    }
}

$email = $_SESSION['email'];

$user_info = $conn->query("Select * from users WHERE email = '$email'");
if ($user_info->num_rows > 0) {
    while($user = $user_info->fetch_assoc()) {
        $user_id =  $user['id'];
    }

    $sql = "Select * from blogs WHERE user_id = '$user_id'";
    $result = $conn->query($sql);
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

    <style>
        .card{
            padding:1rem;
            background: #fff;
            border-radius:1rem;
        }
        .card h2{
            font-size:1.5rem;
        }
        .card p{
            font-size:1rem;
        }
    </style>
</head>
<body>
    <section id="auth">
        <form action="" method="POST">
            <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {?>
                        <div class="card">
                            <h2><?= $row['title'];?></h2>
                            <p><?= substr($row['content'], 0, 50) . '...';?></p>
                        </div>  
            <?php } } else { ?>
             <div class="card">
                <h2>No written blogs found.</h2>
                <p>Try creating a new blog.</p>
            </div>
       <?php }  ?>
        </form>

        <a href="create.php" class="__btn">Create a new blog</a>
    </section>
</body>
</html>
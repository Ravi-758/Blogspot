<?php 
include('../../master/conn.php'); 

$email = $_SESSION['email'];

$result = $conn->query("Select * from users WHERE email = '$email'");

if ($result->num_rows < 0) {
    echo('An unexpected error has occurred.');
} else {

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogSpot</title>
    <link rel="stylesheet" href="../../assets/css/components.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
        .name{
            color:#fff;
            font-weight:bold;
            font-size:1.5rem;
        }
    </style>
</head>
<body>
    <header id="header"> 
        <nav>
            <a href="/" class="logo">BlogSpot</a>
            <ul></ul>
            <div class="flex gap-1 justify-center">  
                <?php 
                  while($row = $result->fetch_assoc()) {
                    echo('<div class="name">'.$row['name'].'</div>');
                  }
                ?>
            </div>     
        </nav>
    </header>
    
    <section id="hero">
        <h1>Publish your passions, your way</h1>
        <p>Create a unique and beautiful blog easily.</p>
        <a class="__btn" href="">Create Your Blog</a>
    </section>
    <section id="blog" style="background-color:cornflowerblue;min-height:200vh ">
        
    </section>
</body>
</html>

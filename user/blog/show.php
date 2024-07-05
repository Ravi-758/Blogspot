<?php include('../../master/conn.php'); 

    include('../auth/middleware/auth.php');

    
if(isset($_SESSION['alert'])){
    if($_SESSION['alert'] != ''){
        echo('<script>alert("'.$_SESSION['alert'].'")</script>');
        $_SESSION['alert'] = '';
    }
}

$email = $_SESSION['email'];

$result9 = $conn->query("Select * from users1 WHERE email = '$email'");

if ($result9->num_rows <= 0) {
    echo('An unexpected error has occurred.');
} else {
    while($row9 = $result9->fetch_assoc()) {
        $name=$row9['name'];
    }
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
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">    
</head>
<body>


<?php include('../../partials/header.php');

    $id= $_GET['id'];
    $result = $conn->query("Select * from blogs WHERE id = '$id'");
    ?>
<main>
    <section id="hero" style="background-image: url('../../assets/images/greenFlowers.jpg')">
        <h1>Blog Spot, The hub of information</h1>
        <p>We are bound to provide valuable and correction information.</p>
    </section>
    

   <section>
    <?php if ($result->num_rows <= 0) {  ?>
        <div style="background:cornflowerblue;font-size:20px;font-weight:bold;text-align:center;padding-block:5rem">No blogs can be found. error: 404</div>
    <?php } else { 
                while($row = $result->fetch_assoc()) {
        ?>
       <section id="blog" style="background-color:cornflowerblue;min-height:200vh ">
        <div class="content">
            <!-- <h1><?= $row['title']?></h1> -->
            <?= $row['content'] ?>

            <div class="author">
               Author:  <a target="_blank" href="<?=$row['author_profile'] ?>" class="btn__link"><?= $row['author_name']?></a>
            </div>
        </div>
    </section>

    <?php } } ?>
   </section>
                </main>
       <?php include('../../partials/footer.php') ?>
</body>
</html>

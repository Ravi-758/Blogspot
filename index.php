<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogSpot</title>
    <link rel="stylesheet" href="./assets/css/components.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">    
</head>
<body>
    <?php 
    include('./master/conn.php'); 
        include('./user/auth/middleware/auth.php');

        include('./partials/header.php');
    ?>
    <main>
        <section id="hero" style="background-image: url('../../assets/images/ocean.jpg')">
            <h1>Publish your passions, your way</h1>
            <p>Create a unique and beautiful blog easily.</p>
            <a class="__btn" href="create.php">Create Your Blog</a>
        </section>

        <section id="blogIndex">
            <h1>You are awesome <b style="color:cornflowerblue"><?= $name ?></b>, Here are your recently added blogs 🫠 </h1>

            <div class="grid">
            <?php 
                $result = $conn->query("Select * from blogs WHERE user_id = '$user_id'");
                if ($result->num_rows <= 0) {  
                ?>
                    <div style="text-align:center;font-size:24px;font-weight:bold;padding-block:5rem">No blogs found</div>
                <?php 
                } else { 
                    while($row = $result->fetch_assoc()) {
                ?>

                    <div class="card">
                        <img class="card-img-top" src="./uploads/blogs/images/<?= $row['image'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= substr($row['title'],0,60)?></h5>
                            <br>    
                        </div>
                        <div class="links">
                            <a href="edit.php?id=<?= $row['id']?>" class="btn btn-success">Edit</a>
                            <a href="delete.php?id=<?= $row['id']?>" class="btn btn-danger">Delete</a>
                            <a href="show.php?id=<?= $row['id']?>" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
        </section>

       

    </main>
    <?php include('./partials/footer.php') ?>

</body>
</html>

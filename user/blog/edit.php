<?php 
include('../../master/conn.php'); 

    include('../auth/middleware/auth.php');

    
$id= $_GET['id'];
$result = $conn->query("Select * from blogs WHERE id = '$id'");

if(isset($_POST['submit'])){

    $author_name = $_POST['author_name'];
    $author_profile = $_POST['author_profile'];
    $title = $_POST['title'];
    $content = $_POST['content']; 
    $email = $_SESSION['email'];
 
    $filename = $_FILES["image"]["name"];
    if(isset($filename) && $filename){
        $tempname = $_FILES["image"]["tmp_name"];

        $imageName = $filename;

        $folder = "../../uploads/blogs/images/" . $imageName;
        
        move_uploaded_file($tempname, $folder);
    }
    else{
        $imageName = $_POST['imageaa'];

    }

    $result = $conn->query("Select * from blogs WHERE id = '$id'");
    if ($result->num_rows <= 0) {
        echo('<script>alert("Error.😒😒")</script>');
    } else {
        $sql = "UPDATE blogs set author_name = '$author_name', author_profile = '$author_profile', title = '$title', image = '$imageName', content = '$content' WHERE id = '$id'";

        
        // echo($sql);die;
        if ($conn->query($sql) === TRUE) {
            $_SESSION['alert'] = 'Yaaayy!, Blog has been edited. 😎😉';
            header('Location: http://localhost/blogspot/user/blog/index.php');
        } else {
            echo('<script>alert("There is an error in your blog content.🫠, please solve it before uploading")</script>');
        }
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
    <script src="../../assets/js/ckeditor.js"></script>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">    
    <style>
       
        .ck-toolbar{
            border-top-left-radius:.5rem !important;
            border-top-right-radius:.5rem !important;
        }
        .ck.ck-editor__main>.ck-editor__editable{
            height:20rem !important;
            border-bottom-left-radius:.5rem !important;
            border-bottom-right-radius:.5rem !important;
        }
    </style>
</head>
<body>
   
<?php 
     include('../../partials/header.php');
?>
    <main>
     <section id="hero" style="color:#fff;background-image: url('../../assets/images/orangeBackground.jpg')">
        <h1>Publish your passions, your way</h1>
        <p>Create a unique and beautiful blog easily.</p>
        <a class="__btn" href="create.php">Create new blog</a>
    </section>

    <section id="form"  style="background-color:cornflowerblue;">
     <h1 class="heading">Edit your blog</h1>
        <div class="flex justify-center">
    <?php if ($result->num_rows <= 0) {  ?>
        <div style="background:cornflowerblue;font-size:20px;font-weight:bold;text-align:center;padding-block:5rem">Huge Error! wow 😢</div>
    <?php } else { 
                while($row = $result->fetch_assoc()) {
        ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="imageaa" value="<?= $row['image'] ?>" />
        <div class="form-group">
            <label for="author_name">Author name</label>
            <input type="text" name="author_name" value="<?= $row['author_name'] ?>" class="form-control" id="author_name">
        </div>
        <div class="form-group">
            <label for="author_profile">Author profile</label>
            <input type="text" name="author_profile"  value="<?= $row['author_profile'] ?>" class="form-control" id="author_profile">
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control"  value="<?= $row['title'] ?>"  name="title" id="title">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control"  value="" name="image" id="image">
        </div>
        <div class="form-group">
            <label for="content">Blog</label>
            <textarea class="form-control" name="content" id="editor1" style="width:10rem"><?= $row['content'] ?></textarea>
        </div>
        
        <button name="submit" type="submit" style="width:100%" class="__btn mx-auto mt-5">Submit</button>
    </form>
                </div>
    <?php } } ?>

    </section>
    </main>
              <?php include('../../partials/footer.php') ?>


</body>
    <script>
         ClassicEditor.create(document.querySelector('#editor1')).catch(error => {
            console.error( error );
        }) 
    </script>
</html>

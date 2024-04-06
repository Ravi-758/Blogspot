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

if ($user_info->num_rows < 0) {
    echo('An unexpected error has occurred.');
}

if(isset($_POST['submit'])){
    while($user = $user_info->fetch_assoc()) {
        $user_id =  $user['id'];
    }
    
    $author_name = $_POST['author_name'];
    $author_profile = $_POST['author_profile'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $result = $conn->query("Select * from blogs WHERE title = '$title'");
    if ($result->num_rows > 0) {
            echo('<script>alert("This blog is already in the database, try editing it.")</script>');
    } else {
        $sql = "INSERT INTO blogs (user_id, title, author_name, author_profile, content, created_at) VALUES ('$user_id', '$title', '$author_name', '$author_profile','$content',now())";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['alert'] = 'Your blog has been posted 🤩';
             header('Location: http://localhost/Github/Blogspot/index.php');
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
    <title>BlogSpot</title>
    <link rel="stylesheet" href="../../assets/css/components.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="../../assets/js/ckeditor.js"></script>
    <style>
        .name{
            color:#fff;
            font-weight:bold;
            font-size:1.5rem;
        }
         .ck-editor{
            max-width:40rem !important;
            border-radius:1rem;
            overflow:hidden;
        }
         /* .ck-toolbar{
            border-top-left-radius:.5rem !important;
            border-top-right-radius:.5rem !important;
        }
        #editor2 .ck.ck-editor__main>.ck-editor__editable{
            height:20rem !important;
            border-bottom-left-radius:.5rem !important;
            border-bottom-right-radius:.5rem !important;
        }
        .#editor1 .ck.ck-editor__main>.ck-editor__editable{
            height:0rem !important;
            border-bottom-left-radius:.5rem !important;
            border-bottom-right-radius:.5rem !important;
        } */
    </style>
</head>
<body>
    <header id="header"> 
        <nav>
            <a href="/" class="logo">BlogSpot</a>
            <ul></ul>
            <div class="flex gap-1 justify-center">  
                <?php 
                  while($user = $user_info->fetch_assoc()) {
                    echo('<div class="name">'.$user['name'].'</div>');
                  }
                ?>
            </div>     
        </nav>
    </header>
    
    <section id="hero" class="flex justify-center flex-col">
        <h1>Publish your passions, your way</h1>
        <p>Create a unique and beautiful blog easily.</p>
        <a class="__btn" href="">Create Your Blog</a>
    </section>
    <section id="" style="background-color:cornflowerblue;">
        <form action="" method="POST" class="flex justify-center flex-col">

            <div class="form-input">
                <input type="text" name="title"  placeholder="Title" required/>
            </div>
            <div class="form-input">
                <input type="text" name="author_name"  placeholder="Author name" required/>
            </div>

            <div class="form-input">
                <textarea name="author_profile" id="editor1" style="width:10rem">Author Profile Link</textarea>
            </div>

            <div class="form-input">
                <textarea name="content" id="editor2" style="width:10rem">Blog Content</textarea>
            </div>
            <button class="__btn" name="submit" type="submit">Submit</button>

        </form>
    </section>
</body>
    <script>
         ClassicEditor.create(document.querySelector('#editor1')).catch(error => {
            console.error( error );
        });
         ClassicEditor.create(document.querySelector('#editor2')).catch(error => {
            console.error( error );
        });
    </script>
</html>

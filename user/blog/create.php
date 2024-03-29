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
    <script src="../../assets/js/ckeditor.js"></script>
    <style>
        .name{
            color:#fff;
            font-weight:bold;
            font-size:1.5rem;
        }
        #editor1{
        }
        .ck-editor{
            margin-block:5rem !important;
            max-width:40rem !important;
        }
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
    
    <section id="hero" class="flex justify-center flex-col">
        <h1>Publish your passions, your way</h1>
        <p>Create a unique and beautiful blog easily.</p>
        <a class="__btn" href="">Create Your Blog</a>
    </section>
    <section id="" class="flex justify-center" style="background-color:cornflowerblue;">
        <textarea name="editor1" id="editor1" style="width:10rem">
    </textarea>
        
    </section>
          

</body>
    <script>
         ClassicEditor.create(document.querySelector('#editor1')).catch(error => {
            console.error( error );
        });
    </script>
</html>

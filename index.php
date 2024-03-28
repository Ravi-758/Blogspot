<?php include('master/conn.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogSpot</title>
    <link rel="stylesheet" href="assets/css/components.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header id="header"> 
        <nav>
            <a href="/" class="logo">BlogSpot</a>
            <ul></ul>
            <div class="flex gap-1 justify-center">  
                <?php 
                if(isset($_SESSION['logged_in'])){
                    if($_SESSION['logged_in'] != 'true'){
                        echo('<a class="__btn" href="user/auth/login.php">Login</a><a class="__btn" href="user/auth/register.php">Register</a>');
                    }
                    else{
                        echo('<a class="__btn" href="user/blog/create.php">Create Your Blog</a><a class="__btn" href="user/auth/logout.php">Logout</a>');
                    }
                }
                else{
                    echo('<a class="__btn" href="user/auth/login.php">Login</a><a class="__btn" href="user/auth/register.php">Register</a>');
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
        <div class="content">
            <h1>A better Blogger experience on the web</h1>
            <p>Since 1999, millions of people have expressed themselves on Blogger. From detailed posts about almost every apple variety you could ever imagine to a blog dedicated to the art of blogging itself, the ability to easily share, publish and express oneself on the web is at the core of Blogger’s mission. As the web constantly evolves, we want to ensure anyone using Blogger has an easy and intuitive experience publishing their content to the web.  
                    That’s why we’ve been slowly introducing an improved web experience for Blogger. Give the fresh interface a spin by clicking “Try the New Blogger” in the left-hand navigation pane. </p>
           
                    <img src="https://lh5.googleusercontent.com/kWHfhyDmS0K6WMbTlfDV8Hq9RKq7Cs2sbPVl0otK3zDV5jNDO0SxM5-Ot89Wo3E11QvmNMI7VYMimqP-Vg9li-cz0cimWiGpJM65-uOSCmAvSN5n7M-lGcNWNW2u0cAfA54ZsGhZ" alt="">
            <p>In addition to a fresh feel, Blogger is now responsive on the web, making it easier to use on mobile devices. By investing in an improved web platform, it allows the potential for new features in the future. </p>
              <p>
                Learn more about the page-specific updates we’ve released to make your Blogger experience even better: 
                Stats
                The redesigned Stats page helps you focus on the most important data from your blog by highlighting your most recent post.    
                Comments
                A fresh Comments page helps you connect with readers more easily by surfacing areas that need your attention, like comment moderation.  
                Posts
                We’ve improved support for Search Operators on the Posts page to help you filter your Blogger posts and page search results more easily. 
                Editor
                The newly enhanced Editor page introduces table support, enables better transliteration, and includes an improved image/video upload experience. 
                Reading List 
                Even if you don’t create from your phone, it’s now easier than ever to read blogs from other creators while you’re on the go.
                Settings 
                We’ve streamlined the Settings page to help you manage all your controls from one place.  
                We’ll be moving everyone to the new interface over the coming months. Starting in late June, many Blogger creators will see the new interface become their default, though they can revert to the old interface by clicking “Revert to legacy Blogger” in the left-hand navigation. By late July, creators will no longer be able to revert to the legacy Blogger interface.  
                We recommend getting ahead of the transition by opting into the experience today. Be sure to let us know what you think about the new design by tapping the Help icon in the top navigation bar. We can’t wait to see how Blogger creators use the latest updates to share their voice with the world.
                Posted by Fontaine on behalf of the Blogger team.</p>   
                <ul>
                    <li>nasnfsad</li>
                    <li>nasnfsad</li>
                    <li>nasnfsad</li>
                </ul>
        </div>
    </section>
</body>
</html>

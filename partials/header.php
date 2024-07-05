<nav id="navbar"> 
    <a href="http://localhost/blogspot/index.php" class="logo">BlogSpot</a>
    <ul></ul>
    <div class="flex gap-1 justify-center">  
        <?php 
        if(isset($_SESSION['logged_in'])){
            if($_SESSION['logged_in'] != 'true'){
                echo('<a class="__btn" href="user/auth/login.php">Login</a><a class="__btn" href="user/auth/register.php">Register</a>');
            }
            else{
                 echo(' <div class="dropdownMenu __btn">
        <input type="checkbox" id="dropdownMenuToggle">
        <label class="__btn" for="dropdownMenuToggle">'. substr($name,0,8).'</label>
        <ul>
            <li><a class="" href="http://localhost/blogspot/user/blog/index.php">Dashboard</a></li>
            <li><a class="" href="http://localhost/blogspot/user/auth/logout.php">Logout</a></li>
        </ul>
    </div>');
            }
        }
        else{
            echo('<a class="__btn" href="user/auth/login.php">Login</a><a class="__btn" href="user/auth/register.php">Register</a>');
        }
        ?>
    </div>     
</nav>
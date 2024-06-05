<div class="logo">
        <h1><span style="color: red;">Online Tiffin</span> <span style="color: rgb(0,191,99);">Service System</span>
        <?php
            if (isset($_SESSION['logged in']) && $_SESSION['logged in'] == true)  {
              echo "Welcome- $_SESSION[username]";
            }
    ?>
    </h1>
    </div>
    <nav>
        <ul>
            <?php
            
    if (isset($_SESSION['logged in']) && $_SESSION['logged in'] == true) 
    {
        echo "
        <li><a href='Index.php'>Home</a></li>
            <li><a href='about.php'>About</a></li>
            <li><a href='contact.php'>Contact</a></li>
            <li><a href='Catfetch.php'>Menu</a></li>
            <li><a href='TiffinCart.php'>Tiffin Cart</a></li>
            <li><a href='my-orders.php'>My Orders</a></li>
            <li style = 'float:right;' ><a href='Logout.php'>LOGOUT</a></li>
            <li style = 'float:right;' ><a href='Changepwd.php'>SETTINGS</a></li>
            <li style = 'float:right;' ><a href='Myprofile.php'>MY PROFILE</a></li>
            
        ";
    }
    else
    {
        echo"
        <li><a href='Index.php'>Home</a></li>
            <li><a href='about.php'>About</a></li>
            <li><a href='contact.php'>Contact</a></li>
            <li><a href='Admin/AdminLogin.php'>Admin</a></li>
            
       
        <li style = 'float:right;' ><a href='Signup.php'>Register</a></li>
        <li style = 'float:right;'><a href='login.php'>LogIn</a></li>
        ";
    }
    ?>
            
        </ul>
    </nav>
    
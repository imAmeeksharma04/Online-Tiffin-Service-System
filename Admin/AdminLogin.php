<?php
 require("../Connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Css/Admin.css" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
    background-image: url('images/backg.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="con1">
            <img src="images/tiffin.jpg" alt="">
        </div>
        <div class="con2">
            <img src="images/admin.png" alt="">
            <h1>Sign In</h1>
            <h2>Enter the Username And Password<br>to access admin panel. </h2>
            <form method="post" action="">
            <div >
                <label for="fullName" >Username</label><br>
                <input type="text" placeholder="Username" id="FullName" name="AdminName" ><br>
                <label for="psw" >Password</label><br>
                <input type="password" placeholder="Password" id="psw" name="Pass" ><br>
                <button type="submit" name="SignIn" >Sign In</button>
                </form>
            </div>
            <div class="an">
            </div>
            <a href="..\Index.php" class="an2">Back Home</a>
            </div>
        </div>

        <!-- PHP SCRIPT...... -->
        <?php
            if (isset($_POST['SignIn'])) 
            {
                $query = "SELECT * FROM `admin` WHERE Admin_Name = '$_POST[AdminName]' AND password = '$_POST[Pass]'";
                $result = mysqli_query($conn,$query);
                if (mysqli_num_rows($result) == 1) 
                {
                    session_start();
                    $_SESSION['AdminId'] = $_POST['AdminName'];
                    header("location:panel.php");

                }
                else 
                {
                    echo "<script>alert('Incorrect credintials')</script>";
                }
            }
        ?>
</body>
</html>
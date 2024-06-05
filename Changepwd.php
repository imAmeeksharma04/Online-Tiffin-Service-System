<!DOCTYPE html>
<?php
require('Connection.php');
session_start();
if (!isset($_SESSION['logged in'])) 
{
    header("location:login.php");
}
$EMail = $_SESSION['email'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Profile.css">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php
    require "navbar.php";
    ?>
    <div class="Gap">
    <h1 style="margin: 0; color:white;">CHANGE PASSWORD</h1>
    </div>
    <div class="parent">
        <div class="child1">
            <h3 style="color: grey; ">Change password if you needed!!</h3>
            <?php
            if (isset($_POST['Change_pws'])) {
                $currentpws = $_POST['Currpsw'];
                $newpws = $_POST['passwd'];
                $conpsw = $_POST['conpasswd'];
                $sql = "SELECT Password from `registrations` where Email = '$EMail'";
                $res = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($res);
            if(password_verify($currentpws,$row['Password'])){
if($conpsw ==''){
            $error[] = 'Please confirm the password.';
        }
        if($newpws != $conpsw){
            $error[] = 'Passwords do not match.';
        }
        if(!isset($error))
{

    $password = password_hash($newpsw,PASSWORD_BCRYPT);

     $result = mysqli_query($conn," UPDATE `registrations` SET Password = '$password' WHERE Email = '$EMail' ");
           if($result)
           {
            echo "<script>alert('Password changed')</script>";
       header("location:Index.php?password_updated=1");
           }
           else 
           {
            $error[]= "echo <script>alert('Something went wrong')</script>";
           }
}
} 
else 
{
    $error[]= "echo <script>alert('current password doesnot match')</script>"; 
}   
}
if(isset($error)){ 

foreach($error as $error){ 
echo '<p>'.$error.'</p>'; 
}
    }

            
            ?>
            <form action="" method="post">
                <label for="" style="color: blue;">Current Password:</label><br>
                <input type="text" name="Currpsw" id=""><br>
                <label for="" style="color: blue;">New Password:</label><br>
                <input type="text" name="passwd" id=""><br>
                <label for="" style="color: blue;">Confirm new Password:</label><br>
                <input type="text" name="conpasswd" id=""><br>
                

                <div class="tag"> 
                    
                                <button class="but1" name="Change_pws">Change Password</button>
                            </div>
            </form>
        </div>
        
        <div class="child2">
            <img style="height: 52vh;padding: 70px 80px;" src="img/doodleChef.jpg" alt="">
        </div>
    </div>
</body>
</html>
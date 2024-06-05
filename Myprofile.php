<!DOCTYPE html>
<?php
require('Connection.php');
session_start();
if (!isset($_SESSION['logged in'])) 
{
    header("location:login.php");
}
$EMail = $_SESSION['email'];
$findResult = mysqli_query($conn,"SELECT * FROM `registrations` WHERE Email = '$EMail'");
if ($result = mysqli_fetch_array($findResult)) {
    $username = $result['Name'];
    $email = $result['Email'];
    $mobno = $result['Mobile Number'];
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="Gap">
    
    </div>
    <div class="parent">
        <div class="child1">
            <h1><?php echo"Welcome! <span style = 'color: rgb(0,191,99);'>$username</span>" ?></h1>
            <table >
                <tr>
                    <th>
                        Username:
                    </th>
                    <td style="border-bottom: 1px solid #ddd;" >
                        <?php
                        echo"$username";
                        ?>
                    </td>
                </tr>
                <tr>
                    <th >
                        Contact:
                    </th>
                    <td style="border-bottom: 1px solid #ddd;" >
                        <?php
                        echo"$mobno";
                        ?>
                    </td>
                </tr>
                <tr>
                    <th >
                        Email:
                    </th>
                    <td style="border-bottom: 1px solid #ddd;" >
                        <?php
                        echo"$email";
                        ?>
                    </td>
                </tr>
            </table>
            <div class="tag">
                <a href="UpdateDetails.php">
                            <button class="but1">Edit Profile</button></a>
                            <a href="Index.php">
                            <button class="but1">Home Page</button></a>
                        </div>
        </div>
        
        <div class="child2">
            <img style="height: 52vh;padding: 70px 80px;" src="img/doodleChef.jpg" alt="">
        </div>
    </div>
</body>
</html>
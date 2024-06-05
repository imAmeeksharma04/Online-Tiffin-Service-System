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
    $oldname = $result['Name'];
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
            
            
            <form action="" method="post">
            <?php 
            if (isset($_POST['Updatepro'])) 
            {
                $username = $_POST['username'];
                $mobno = $_POST['mobno'];
                $sql = "SELECT * FROM `registrations` where Name = '$username'";
                $res = mysqli_query($conn,$sql);
            if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);

                if ($oldname!=$username) 
                {
                if ($username == $row['Name']) 
                {
                    $error[] = 'Username already taken!';
                }
                }
            }

            if (!isset($error)) {
                $result = mysqli_query($conn,"UPDATE `registrations` SET `Name` = '$username', `Mobile Number` = $mobno WHERE `registrations`.`Email` = '$email'; " );
                if ($result) {
                    header("location:Myprofile.php?profile_updated=1");
                }
                else {
                    $Error[] = 'Something went wrong!';
                }
            }
            if(isset($error)){ 
            foreach($error as $error){ 
                echo "$error"; 
                }
            }
        }
        
            ?>
            <table >
                <tr>
                    <th>
                        Username:
                    </th>
                    <td style="border-bottom: 1px solid #ddd;" ><input class="Form-Control" type="text" value="<?php
                        echo"$username";
                        ?>" name="username">
                    </input>
                    </td>
                </tr>
                <tr>
                    <th >
                        Contact:
                    </th>
                    <td style="border-bottom: 1px solid #ddd;" ><input class="Form-Control" type="text" value="<?php
                        echo"$mobno";
                        ?>" name="mobno">
                    </input>
                    </td>
                    </td>
                </tr>
            </table>
            
            <div class="tag">
                
                            <button class="but1" name="Updatepro">Update Profile</button>
                        </div>
                    </div>
                </form>
                        <div class="child2">
            <img style="height: 52vh;padding: 70px 80px;" src="img/doodleChef.jpg" alt="">
        </div>
    </div>
</body>
</html>
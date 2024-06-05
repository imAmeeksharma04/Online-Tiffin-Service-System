<?php
    /*    $login = false;
        $showError = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "Connection.php";
        $email = $_POST['email'];
        $password = $_POST['psw'];
        $password = md5($password);
        

        
            $sql = "Select * from registrations where Email = '$email' AND Password = '$password' "; 
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            if($num == 1){
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                header("location: loggedin.php");
            }
            else {
                $showError = "Invalid credentials";
            }
        
        
    } */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    require "navbar.php";
    ?>
    
            <div class="container2">
                <div class="con1">
                    <div class="tag">
                        <span><h4 class="Atag">Home > <mark>Login</mark></h4>
                    </div>
                        <div class="tag">
                            <h3>New CUSTOMER!!</h3>
                            <p class="para">By creating an account with our store ,you will be able to move through the checkout <br>
                                process faster ,store multiple shipping addresses ,view and track your orders in your <br> account and more.</p>
                        </div>
                        <div class="tag">
                            <button class="but1" onclick="window.location.href = 'Signup.php'">Create An Account</button>
                        </div>
                </div>
                <div class="con2">
                    <div class="tag">
                        <h3 class="tag1">REGISTERED Customers</h3>
                        <p class="para">If you have an account, Please LogIn</p>
                        <form action="login_register.php" method="post">
                            <div class="container3">
                                

                                <label for="email"><b>Username/Email*</b></label><br>
                                <input type="text" placeholder="Username/Email" name="Email_Username" required><br>
                            
                                <label for="psw"><b>Password*</b></label><br>
                                <input type="password" placeholder="Password" name="psw" required><br>
                                <input type="submit"  name="logIn" style="background-color: rgb(226,69,38);
    color: white;
    width: 20%;
    height: 5vh;
    border: none;
    cursor: pointer;
    opacity: 0.9;"  value="Sign Up"/>
                        </form>
                    </div>
                </div>
            </div>

    <footer class="Footer2">
        Copyright &copy;
    </footer>
</body>
</html>
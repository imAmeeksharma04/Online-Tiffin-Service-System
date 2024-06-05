
<?php
     /* $showAlert = false;
        $showError = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "Connection.php";
        $username = $_POST['FullName'];
        $MobileNumber = $_POST['MobileNumber'];
        $email = $_POST['email'];
        $password = $_POST['psw'];
        $password = md5($password);
        $exists = false;
        //checking the redundancy of username
        $existssql = "SELECT * FROM `registrations` WHERE Name = 'Ameek' ";
        $result = mysqli_query($conn, $existssql);
        $numExistRows = mysqli_num_rows($result);
        if($numExistRows >0){
            $exists = true;
        }
        else {
            $exists = false;
        }
        
        if($exists==false){
            $sql = "INSERT INTO `registrations` ( `Name`, `Mobile Number`, `Email`, `Password`) 
            VALUES ( '$username', '$MobileNumber', '$email', '$password') ";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
            }
        }
        else {
            $showError = "Username already exists!!";
        }

        
    }
    */
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
    
   
</div>
</div>
    
            <div class="container2">
                <div class="con1">
                    <div class="tag">
                        <span><h4 class="Atag">Home > <mark>Sign Up</mark></h4>
                    </div>
                        <div class="tag">
                            <h3>Existing CUSTOMERS!!</h3>
                            <p class="para">By creating an account with our store ,you will be able to move through the checkout <br>
                                process faster ,store multiple shipping addresses ,view and track your orders in your <br> account and more.</p>
                        </div>
                        <div class="tag">
                            <button class="but1" onclick="window.location.href = 'login.php'">Already Have An Account</button>
                        </div>
                </div>
                <div class="con2">
                    <div class="tag">
                        <h3 class="tag1">REGISTER With Us</h3>
                        <p class="para">If you are new ,Join Us. Please SignIn</p>
                        <form action="login_register.php" method="post">
                            <div class="container3">
                                <label for="fullName"><b>Full Name*</b></label><br>
                                <input type="text" placeholder="Full Name" id="FullName" name="FullName" required><br>
                                
                                <label for="MobNumber"><b>Mobile Number*</b></label><br>
                                <input type="number" placeholder="Mobile Number" id="MobileNumber" name="MobileNumber" required><br>

                                <label for="email"><b>Email*</b></label><br>
                                <input type="text" placeholder="Email" id="email" name="email" required><br>
                            
                                <label for="psw"><b>Password*</b></label><br>
                                <input type="password" placeholder="Password" id="psw" name="psw" required><br>
                                <input type="submit"  name="SignUp" style="background-color: rgb(226,69,38);
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

    <footer class="Footer2" style="padding: 17px;">
        Copyright &copy;
    </footer>
</body>
</html>
<?php
require('Connection.php');
session_start();



#for registration-->
if (isset($_POST['SignUp'])) 
{
    $pass = $_POST['psw'];
$password = password_hash($pass,PASSWORD_BCRYPT);
$username = $_POST['FullName'];
$MobileNumber = $_POST['MobileNumber'];
$email = $_POST['email'];

        $user_exist_query="SELECT * FROM `registrations` WHERE Name = '$username' OR Email = '$email' ";
        $result = mysqli_query($conn,$user_exist_query);

        if ($result) {
            if (mysqli_num_rows($result)>0) 
            {
            #If any user has already taken username or email.
                $result_fetch = mysqli_fetch_assoc($result);
                if ($result_fetch['Name']==$username) {
                    echo"
                    <script>alert('$result_fetch[Name]--Username already taken');
                    window.location.href='index.php';
                    </script>
                    ";
                }
                else{
                    echo"
                    <script>alert('$result_fetch[Email]--Email already registered');
                    window.location.href='index.php';
                    </script>
                    ";
                }
            }
            else {
                $query = "INSERT INTO `registrations` ( `Name`, `Mobile Number`, `Email`, `Password`) 
                VALUES ( '$username', '$MobileNumber', '$email', '$password') ";

                if (mysqli_query($conn,$query)) {
                    #if data inserted successfully
                    echo"
                    <script>alert('Successfully regestered');
                    window.location.href='index.php';
                    </script>
            ";
                }
                else{
                    #if data not inserted
                    echo"
                    <script>alert('cannot run query');
                    window.location.href='index.php';
                    </script>
            ";
                }
            }
        }
        else {
            echo"
                <script>alert('cannot run query');
                window.location.href='index.php';
                </script>
            ";
        }
}

#for login
if (isset($_POST['logIn'])) 
{
    $query = "SELECT * FROM `registrations` WHERE Name = '$_POST[Email_Username]' OR Email = '$_POST[Email_Username]'";
    $result = mysqli_query($conn,$query);

    if ($result) 
    {
        if(mysqli_num_rows($result)==1)
        {
            $result_fetch = mysqli_fetch_assoc($result);
            if (password_verify( $_POST['psw'],$result_fetch['Password'])) 
            {
                #password matched
                
                $_SESSION['logged in'] = true;
                $_SESSION['username'] = $result_fetch['Name'];
                $_SESSION['User_id'] = $result_fetch['sno'];
                $_SESSION['email'] = $result_fetch['Email'];
                $_SESSION['Usr_auth'] = [
                    'Name' => $usrnam,
                    'Email' => $usrmail,
                    'sno' => $usrid
                ];
                echo "$usrid";
                $_SESSION['MobileNumber'] = $result_fetch['Mobile Number'];
                header("location:Index.php");
            }
            else{
                #password doesnot matched
                echo"
                    <script>alert('Incorrect Password');
                    window.location.href='Index.php';
                    </script>
            ";
            }
        }
        else {
            echo"
                    <script>alert('Email or Username not registered');
                    window.location.href='index.php';
                    </script>
            ";
        }
    }
    else {
        echo"
                    <script>alert('query cannot run');
                    window.location.href='index.php';
                    </script>
            ";
    }
}

?>
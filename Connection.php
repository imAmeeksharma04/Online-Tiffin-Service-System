<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "tiffindb" ;
$conn = mysqli_connect($servername, $username, $password, $db_name);
if (mysqli_connect_error()) {
    echo "<script> alert('cannot connect to the database!!'); </script>";
    exit();
}


?>
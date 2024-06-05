<?php
session_start();
include('../Connection.php');


if(isset($_SESSION['logged in']) && $_SESSION['logged in'] == true)
{
    if(isset($_POST['scope']))
    {
        $scope = $_POST['scope'];
        switch ($scope)
        {
            case "add":
                $T_id = $_POST['T_id'];
                $T_qty = $_POST['T_qty'];

                $EMail = $_SESSION['email'];
                $findResult = mysqli_query($conn,"SELECT * FROM `registrations` WHERE Email = '$EMail'");
                if($result = mysqli_fetch_array($findResult)) {
                    $user_id = $result['sno'];
                }

                $chk_existing_cart = "SELECT * FROM `carts` WHERE T_id = $T_id AND User_id = $user_id";
                $chk_existing_cart_run = mysqli_query($conn, $chk_existing_cart);

                if(mysqli_num_rows($chk_existing_cart_run) > 0){
                    echo "already";
                }
                else{

                $insert_query = "INSERT INTO `carts` (User_id, T_id, T_qty) VALUES ('$user_id', '$T_id', '$T_qty')";
                $insert_query_run = mysqli_query($conn, $insert_query);
                if($insert_query_run){
                    echo 201;
                }
                else{
                    echo 500;
                }
                }
                break;

            case "update":
                $T_id = $_POST['T_id'];
                $T_qty = $_POST['T_qty'];

                $EMail = $_SESSION['email'];
                $findResult = mysqli_query($conn,"SELECT * FROM `registrations` WHERE Email = '$EMail'");
                if($result = mysqli_fetch_array($findResult)) {
                    $user_id = $result['sno'];
                }
                $chk_existing_cart = "SELECT * FROM `carts` WHERE T_id = $T_id AND User_id = $user_id";
                $chk_existing_cart_run = mysqli_query($conn, $chk_existing_cart);
                if(mysqli_num_rows($chk_existing_cart_run) > 0){
                    $update_query = "UPDATE `carts` SET T_qty = $T_qty WHERE T_id = $T_id AND User_id = $user_id ";
                    $update_query_run = mysqli_query($conn, $update_query);
                    if($update_query_run)
                    {
                        echo 200;
                    }
                    else
                    {
                        echo 500;
                    }
                }
                else
                {
                    echo "Something went wrong";
                }
                break;
                
            case "delete":
                $Cart_id = $_POST['Cart_id'];

                $EMail = $_SESSION['email'];
                $findResult = mysqli_query($conn,"SELECT * FROM `registrations` WHERE Email = '$EMail'");
                if($result = mysqli_fetch_array($findResult)) {
                    $user_id = $result['sno'];
                }
                $chk_existing_cart = "SELECT * FROM `carts` WHERE Cart_id = $Cart_id AND User_id = $user_id";
                $chk_existing_cart_run = mysqli_query($conn, $chk_existing_cart);
                if(mysqli_num_rows($chk_existing_cart_run) > 0){
                    $delete_query = "DELETE FROM `carts` WHERE Cart_id = $Cart_id";
                    $delete_query_run = mysqli_query($conn, $delete_query);
                    if($delete_query_run)
                    {
                        echo 200;
                    }
                    else
                    {
                        echo "Something went wrong";
                    }
                }
                else
                {
                    echo "Something went wrong";
                }
                break;

                default:
                echo 500;
            }
        }
    }
    else
    {
        echo 401;
    }
    
    

?>
<?php
include("../Connection.php");


function getAll($table)
{
global $conn;

    $query = "SELECT * FROM $table ";
    return $result = mysqli_query($conn,$query);
}

function getById($table, $id)
{
global $conn;

    $query = "SELECT * FROM $table WHERE id = $id ";
    return $result = mysqli_query($conn,$query);
}

function getById2($table, $id)
{
global $conn;

    $query = "SELECT * FROM $table WHERE Id = $id ";
    return $result = mysqli_query($conn,$query);
}


function redirect($url, $message)
{
    $_SESSION['message'] =$message;
    header("location: ".$url);
    exit();
}

function getAllOrders()
{
    global $conn;

    $query = "SELECT * FROM orders  WHERE status = '0' ";
    return $query_run =  mysqli_query($conn,$query);
}

function checkTracking($trackingNo)
{
    global $conn;
    

                $query = "SELECT * FROM `orders` WHERE tracking_no = '$trackingNo'";
                return mysqli_query($conn, $query);
}

function getOrderHistory()
{
    global $conn;

    $query = "SELECT * FROM orders  WHERE status != '0' ";
    return $query_run =  mysqli_query($conn,$query);
}

?>
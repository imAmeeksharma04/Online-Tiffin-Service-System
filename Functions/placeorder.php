<?php

session_start();
include('../Connection.php');
function getCartItems()
{
    global $conn;
    $EMail = $_SESSION['email'];
                $findResult = mysqli_query($conn,"SELECT * FROM `registrations` WHERE Email = '$EMail'");
                if($result = mysqli_fetch_array($findResult)) {
                    $user_id = $result['sno'];
                }
    $query_cart = "SELECT c.Cart_id as cid, c.T_id, c.T_qty, t.Id as tid, t.Name, t.Image, t.Price 
                FROM carts c, tiffins t WHERE c.T_id = t.Id AND c.User_id = $user_id ORDER BY c.Cart_id DESC";
    return $query_run = mysqli_query($conn, $query_cart);
}




if(isset($_SESSION['logged in']) && $_SESSION['logged in'] == true)
{
    if(isset($_POST['placeOrederBtn']))
    {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']); 
        // $payment_id = mysqli_real_escape_string($conn, $_POST['payment_id']);

                $EMail = $_SESSION['email'];
                $findResult = mysqli_query($conn,"SELECT * FROM `registrations` WHERE Email = '$EMail'");
                if($result = mysqli_fetch_array($findResult)) {
                    $user_id = $result['sno'];
                }
        $trackingno = "ODI".rand(1111,9999).substr($phone,5);
        
        $Cartitems = getCartItems();
        $totalPrice = 0;
            foreach ($Cartitems as $citem)
                {
                    $totalPrice = $totalPrice + $citem['Price']*$citem['T_qty'];
                }
        $insert_query = "INSERT INTO `orders` (tracking_no, user_id, name, email, phone, address, pincode, 
        total_price, payment_mode ) 
        VALUES ('$trackingno', $user_id, '$name', '$email', '$phone', '$address', $pincode, $totalPrice, '$payment_mode')";

        $insert_query_run = mysqli_query($conn, $insert_query);

        if ($insert_query_run) {
            $order_id = mysqli_insert_id($conn);
            foreach ($Cartitems as $citem) {
                $tiffin_id = $citem['T_id'];
                $tiffin_qty = $citem['T_qty'];
                $tiffin_Price = $citem['Price'];
            
            $insert_items_query = "INSERT INTO `order_items` (order_id, t_id, t_qty, price) 
            VALUES ($order_id, $tiffin_id, $tiffin_qty, $tiffin_Price)";
            $insert_items_query_run = mysqli_query($conn, $insert_items_query);
            }

            $deleteCartQuery = "DELETE FROM `carts` WHERE User_id = $user_id" ;
            $deleteCartQueryRun = mysqli_query($conn, $deleteCartQuery);

            echo"
                    <script>
                    alert('Order placed Successfully with your order-id: $trackingno ');
                    window.location.href='../my-orders.php';
                    </script>
            ";
            die();
        }
        
    
    }
}
else
{
    header("Location:../Index.php");
}
?>
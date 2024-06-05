<?php
session_start();
include 'navbar.php';
include 'Connection.php';
include ('Functions/UserFunctions.php');

if (isset($_GET['t'])) 
{
    $tr_no = $_GET['t'];
    $OrderData = checkTracking($tr_no);

    if(mysqli_num_rows($OrderData) < 0)
    {
        ?>
        <h4>something went wrong</h4>
        <?php
        die();
    }

}
else
{
?>
<h4>something went wrong</h4>
<?php
die();
}

$data = mysqli_fetch_array($OrderData);
?>


<!DOCTYPE html>
<?php
if (!isset($_SESSION['logged in'])) 
{
    header("location:Index.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/I2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.rtl.min.css"/> 
    <!-- <script type="text/javascript" src="jquery-3.5.1.min.js"></script>  -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="btn.js"></script> 
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <!-- <link rel="stylesheet" href="Admin/Assets/js/bootstrap.bundle.min.js"> -->
    <title>Document</title>
</head>
<body>
<div class="py-3">
    <div class="container ms-3">
        <span>
            <h6 style="font: size 30px; " class="Atag"><a style="color: black; text-decoration:none ;" href="Index.php">Home </a> > 
            <a style="color: black; text-decoration:none ;" href="my-orders.php">My Orders</a> >
            <mark style="background-color: rgb(0,191,99);">View Order</mark>
            </h6>
            </div>
    </div>
<div class="py-5">
    <div class="container">
        <div class="card card-body shadow">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <span class="text-white fs-4">View Order</span>
                            <a href="my-orders.php" class="btn btn-warning float-end"> <i class="fa fa-reply"></i> Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Delivery Details</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Name</label>
                                            <div class="border p-1">
                                                <?= $data['name']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Email</label>
                                            <div class="border p-1">
                                                <?= $data['email']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Phone</label>
                                            <div class="border p-1">
                                                <?= $data['phone']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Tracking no</label>
                                            <div class="border p-1">
                                                <?= $data['tracking_no']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Address</label>
                                            <div class="border p-1">
                                                <?= $data['address']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Pin ode</label>
                                            <div class="border p-1">
                                                <?= $data['pincode']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Order Details</h4>
                                    <hr>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Tiffin</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                    <?php
                                    $EMail = $_SESSION['email'];
                                    $findResult = mysqli_query($conn,"SELECT * FROM `registrations` WHERE Email = '$EMail'");
                                    if($result = mysqli_fetch_array($findResult)) 
                                    {
                                        $user_id = $result['sno'];
                                    }
                                        $order_query = "SELECT o.id AS oid, o.tracking_no, o.user_id, oi.*, t.* FROM orders o, order_items oi, 
                                                tiffins t WHERE o.user_id = $user_id AND oi.order_id=o.id AND t.Id = oi.t_id 
                                                AND o.tracking_no = '$tr_no' ";
                                        $order_query_run = mysqli_query($conn, $order_query);

                                        if (mysqli_num_rows($order_query_run) > 0) 
                                        {
                                            foreach ($order_query_run as $items) {
                                                ?>
                                                <tr>
                                                    <td class="alidn-middle">
                                                        <img src="Uploads/<?= $items['Image']; ?>" width="100px" height="100px" alt="<?= $items['Image']; ?>">
                                                        <?= $items['Name']; ?>
                                                    </td>
                                                    <td class="alidn-middle">
                                                    <?= $items['price']; ?>
                                                    </td>
                                                    <td class="alidn-middle">
                                                    <?= $items['t_qty']; ?>
                                                    </td>
                                                </tr>       
                                                <?php
                                            }
                                        }
                                    ?>
                                    </tbody>
                                </table>
                                <hr>
                                <h5>Total Price: <span class="float-end fw-bold"><?= $data['total_price']; ?></span></h5>
<hr>
                                    <label class="fw-bold">Payment Mode:</label>
                                <div class="border p-1 mb-3">
                                        <?= $data['payment_mode']; ?>
                                </div>
                                <label class="fw-bold">Status:</label>
                                <div class="border p-1 mb-3">
                                        <?php 
                                        
                                            if($data['status'] == 0) 
                                            {
                                                echo "pending" ;
                                            }else if($data['status'] == 1)
                                            {
                                                echo "Accepted";
                                            }else if ($data['status'] == 2)
                                            {
                                                echo "Cancelled";
                                            }
                                        
                                        ?>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
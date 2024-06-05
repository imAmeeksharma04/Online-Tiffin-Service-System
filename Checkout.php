<?php
session_start();
include 'navbar.php';
include 'Connection.php';
include ('Functions/UserFunctions.php');
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
            <mark style="background-color: rgb(0,191,99);">Checkout</mark> 
            </h6>
            </div>
    </div>
<div class="py-5">
    <div class="container">
        <div class="card card-body shadow">
            <form action="Functions/placeorder.php" method="post">
        <div class="row">
            <div class="col-md-7">
                <h5>Basic Details</h5>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Name</label>
                        <input type="text" name="name" required placeholder="Enter your full name" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">E-mail</label>
                        <input type="email" name="email" required placeholder="Enter your email" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Phone no</label>
                        <input type="text" name="phone" required placeholder="Enter your phone number" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Pin code</label>
                        <input type="text" name="pincode" required placeholder="Enter your pin code" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="fw-bold">Address</label>
                        <textarea name="address" required class="form-control" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                    <h5>Order details</h5>
                    <hr>
                <?php $items = getCartItems(); 
                        $totalPrice = 0;
            foreach ($items as $citem)
                {
                    ?>
                    <div class="mb-1 border">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <img src="Uploads/<?= $citem['Image'] ?>" alt="Image" class="w-60" style="height: 60px;">
                            </div>
                            <div class="col-md-5">
                                <label ><?= $citem['Name'] ?></label>
                            </div>
                            <div class="col-md-2">
                                <label >Rs. <?= $citem['Price'] ?></label>
                            </div>
                            <div class="col-md-2">
                            <label >x <?= $citem['T_qty'] ?></label>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    $totalPrice = $totalPrice + $citem['Price']*$citem['T_qty'];
                }
                ?>
                <hr>
                <h5>Total Price : <span class="float-end fw-bold"><?= $totalPrice ?></span></h5>
                <div class="">
                    <input type="hidden" name="payment_mode" value="COD">
                    <button type="submit" name="placeOrederBtn" class="btn btn-primary w-100">Confirm and Place Order | COD</button>
                </div>
                </div>
                    </div>
        </div>
        </form>
    </div>
</div>

</body>
</html>
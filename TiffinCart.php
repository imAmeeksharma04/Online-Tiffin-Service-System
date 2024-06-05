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
            <mark style="background-color: rgb(0,191,99);">Tiffin Cart</mark> 
            </h6>
            </div>
    </div>
<div class="py-5">
    <div class="container">
        <div class="card card-body shadow">
        <div class="row">
            <div class="col-md-12">
                <div id="mycart">
            <?php $items = getCartItems(); 

if(mysqli_num_rows($items) > 0)
{ ?>
            <div class="row align-items-center">
                        <div class="col-md-5">
                            <h6>Product</h6>
                        </div>
                        <div class="col-md-3">
                            <h6>Price</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Quantity</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Remove</h6>
                        </div>
                    </div>
                    <div id="">
                <?php
                foreach ($items as $citem)
            {
                ?>
                <div class="card product_data shadow-sm mb-3">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <img src="Uploads/<?= $citem['Image'] ?>" alt="Image" class="w-50">
                        </div>
                        <div class="col-md-3">
                            <h5><?= $citem['Name'] ?></h5>
                        </div>
                        <div class="col-md-3">
                        <h5>Rs<?= $citem['Price'] ?></h5>
                        </div>
                        <div class="col-md-2">
                            <input type="hidden" class="tId" value="<?= $citem['T_id'] ?>">
                            <div class="input-group mb-3" style="width:130px;">
                            <button class="input-group-text decrement-btn updateQty">-</button>
                            <input type="text" class="form-control text-center input-qty bg-white" value="<?= $citem['T_qty'] ?>" disabled>
                            <button class="input-group-text increment-btn updateQty">+</button>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger btn-sm deleteItem" value="<?= $citem['cid'] ?>">
                            <i class="fa fa-trash me-2"></i>Remove</button>
                        </div>
                    </div>
                </div>
                <?php
            }
                
                ?>
                </div>
                <div class="float-end">
                    <a href="Checkout.php" class="btn btn-outline-primary">Proceed to checkout</a>
                </div>
                <?php
}
else
{
?>
    <div class="card card-body shadow text-center">
        <h4 class="py-3">
            Your cart is empty!
        </h4>
    </div>
<?php
}
                ?>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
<?php
session_start();
include 'navbar.php';
include ('Functions/UserFunctions.php');
?>


<!DOCTYPE html>
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

<?php

if(isset($_GET['tiffin']))
{
    $tiffin_slug = $_GET['tiffin'];
    $tiffin_data = getSlugActive2("tiffins",$tiffin_slug);
    $tiffin = mysqli_fetch_array($tiffin_data);
    if($tiffin)
    {  
        ?>
        <div class="tag">
        <span>
            <h4 style="font: size 30px; " class="Atag">Home > 
            <a href="Catfetch.php" style="color: black; text-decoration: none;">Menu</a> > <mark style="background-color: rgb(0,191,99);"><?= $tiffin['Name']; ?></mark> 
            </h4>
    </div>

    <div class="bg-light py-4">

        <div class="container product_data mt-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="shadow">
                    <img src="Uploads/<?= $tiffin['Image']; ?>" alt="TiffinImage" class="w-100">
                    </div>
                </div>
                <div class="col-md-8">
                    <h4 style="color: black;" class="fw-bold"><?= $tiffin['Name'] ?></h4>
                    <hr style="color:black;">
                    <h4 style="color: black; font-weight:100;">Rs <span class="text-success fw-bold"><?= $tiffin['Price'] ?></span> </h4>
                    <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3" style="width:130px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" class="form-control text-center input-qty bg-white" value="1" disabled>
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <button class="btn btn-primary px-4 AddToCart-btn" value="<?= $tiffin['Id'] ?>">
                                    <i class="fa fa-shopping-cart me-2 "></i>Add to cart</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-danger px-4"><i class="fa fa-shopping-cart me-2"></i>Add to wishlist</button>
                            </div>
                        </div>
                        <hr style="background-color:black;">
                    <h6 style="color:black;" class="mt-3">Tiffin Description:</h6>
                    <p style="color: black;"><?= $tiffin['Description'] ?></p>
                    
                        
                </div>
            </div>
        </div>
        </div>
        <?php
    }
else
{
    echo "Product not found";
}
}
else
{   
    echo "Something went wrong";
}
?>


</body>
</html>


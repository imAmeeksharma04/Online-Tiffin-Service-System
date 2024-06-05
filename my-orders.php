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
            <mark style="background-color: rgb(0,191,99);">My Orders</mark> 
            </h6>
            </div>
    </div>
<div class="py-5">
    <div class="container">
        <div class="card card-body shadow">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tracking no</th>
                                <th>Price</th>
                                <th>Ordered on</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $orders = getOrders();

                                if(mysqli_num_rows($orders) > 0)
                                {
                                    foreach ($orders as $item) {
                                        ?>
                                            <tr>
                                                <td> <?= $item['id'] ?></td>
                                                <td> <?= $item['tracking_no'] ?></td>
                                                <td> <?= $item['total_price'] ?></td>
                                                <td> <?= $item['created_at'] ?></td>
                                                <td>
                                                    <a href="vieworder.php?t=<?= $item['tracking_no'] ?>" class="btn btn-primary">View details</a>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                        <tr>
                                                <td colspan="5">No Oreders yet</td>
                                                
                                        </tr>
                                    <?php
                                }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
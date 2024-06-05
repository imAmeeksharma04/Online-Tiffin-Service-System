<?php
session_start();
include 'navbar.php';
include 'Functions/UserFunctions.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/I2.css">
    <link rel="stylesheet" href="Admin/Assets/css/material-dashboard.min.css">
    <link rel="stylesheet" href="Admin/Assets/js/bootstrap.bundle.min.js">
    <title>Document</title>
</head>

<body>
    <div class="tag">
        <span>
            <h4 style="font: size 30px; " class="Atag">Home > <mark style="background-color: rgb(0,191,99);">Menu</mark></h4>
    </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Our Menu</h1>
                    <hr style="background-color:rgb(52,71,103)">
                    <div class="row">
                        <?php
                        $categories = getAllActive("categories");

                        if (mysqli_num_rows($categories) > 0) {
                            foreach ($categories as $item) {
                        ?>
                            <div class="col-md-3 mb-2">
                                <a href="TifFetch.php?category=<?= $item['slug']; ?>">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <img src="Uploads/<?= $item['Image']; ?>" alt="Category Image" class="w-100">
                                        <h4 class="text-center"><?= $item['Name']; ?></h4>
                                    </div>
                                </div>
                            </a>
                            </div>
                        <?php
                            }
                        } else {
                            echo "no data available";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
session_start();
include 'navbar.php';
include ('Functions/UserFunctions.php');

if(isset($_GET['category'])){ 
$category_slug = $_GET['category'];
$category_data = getSlugActive("categories",$category_slug);
$category = mysqli_fetch_array($category_data);
$cid = $category['id'];
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
        <div class="container">
        <span>
            <h4 style="font: size 30px; " class="Atag"><a href="Index.php"> Home</a> > 
            <a href="Catfetch.php">
                <mark style="background-color: rgb(0,191,99);">Menu</mark>  
            </a> >
            <mark style="background-color: rgb(0,191,99);"><?= $category['Name']; ?></mark></h4>
            </div>
        </div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?= $category['Name']; ?></h1>
                    <hr style="background-color:rgb(52,71,103)">
                    <div class="row">
                        <?php
                        $tiffin = getTiffByCategory($cid);

                        if (mysqli_num_rows($tiffin) > 0) {
                            foreach ($tiffin as $item) {
                        ?>
                            <div class="col-md-3 mb-2">
                                <a href="TiffinView.php?tiffin=<?= $item['Slug']; ?>">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <img src="Uploads/<?= $item['Image']; ?>" alt="Tiffin Image" class="w-100">
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
                <?php  }
                else
                {
                    echo "Something went wrong";
                }
                
                ?>
</body>

</html>
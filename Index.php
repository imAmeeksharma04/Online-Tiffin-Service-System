<?php
require('Connection.php');
session_start();
include('Functions/UserFunctions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Courgette&family=Dancing+Script:wght@700&family=Lobster+Two:ital,wght@0,400;0,700;1,400;1,700&family=Nunito+Sans:opsz,wght@6..12,700&family=Open+Sans:wght@600&family=Satisfy&family=Teko:wght@500&family=Tilt+Prism&family=Victor+Mono:wght@500&display=swap" rel="stylesheet">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
<?php
    require "navbar.php";
    ?>
    
    <div class="container" >
      <img src="img/foodbg.jpg" alt="" class="foodbgi">
      <div class="centered"><h1 class="fontimg">Online Tiffin Service System</h1></div>
      <div class="centered2"><h1 class="fontimg2">To Order Online</h1></div>
    </div>
    <div class="main">
      <h1>Ordering Tiffin was never so easy!!</h1>
    </div>
    <div class="main2">
      <h3>-------------------------Just 4 steps to follow-------------------------</h3>
    </div>
    <div class="steps">
      <img class="editimg" src="img/select.png" alt="">
      <img class="editimg" src="img/order.png" alt="">
      <img class="editimg" src="img/pay.png" alt="">
      <img class="editimg" src="img/enjoy.png" alt="">
    </div>
    <div class="main3">
      <h2>------------------------------Tiffin Available------------------------------</h2>
    </div>
    <?php
    require "menu.php";
    ?>
    <footer>
      copyright &copy;
    </footer>
    <script>
function redirect() {
  alert("Login to access!!");
}
</script>
</body>

</html>
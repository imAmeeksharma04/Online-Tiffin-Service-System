<div class="orders">
      <?php
    if (isset($_SESSION['logged in']) && $_SESSION['logged in'] == true) 
    {
        echo "
        <div>
          <a href='Catfetch.php' ><img class='OrderEdit' src='img/smallMeal.jpg' alt=''></a>
          <h4 style='text-align: center;'>Small Veg Tiffin</h4>
        </div>
        <div>
          <a href='Catfetch.php'  ><img class='OrderEdit' src='img/MediumMeal.jpeg' alt=''></a>
          <h4 style='text-align: center;'>Medium Veg Tiffin</h4>
        </div>
        <div>
          <a href='Catfetch.php' ><img class='OrderEdit' src='img/LargeMeal.jpg' alt=''></a>
          <h4 style='text-align: center;'>Large Veg Tiffin</h4>
        </div>
      </div>
      <br>
      <div class='orders'>
        <div>
          <a href='Catfetch.php' ><img class='OrderEdit' src='img/nonvegMedium.jpeg' alt=''></a>
          <h4 style='text-align: center;'>Small Nonveg Tiffin</h4>
        </div>
        <div>
          <a href='Catfetch.php' ><img class='OrderEdit' src='img/nonvegSmall.jpeg' alt=''></a>
          <h4 style='text-align: center;'>Medium Nonveg Tiffin</h4>
        </div>
        <div>
          <a href='Catfetch.php' ><img class='OrderEdit' src='img/nonvedLarge.jpeg' alt=''></a>
          <h4 style='text-align: center;'>Large Nonveg Tiffin</h4>
        </div> ";
    }
    else
    {
        echo "
        <div>
          <a href='' onclick='redirect();'><img class='OrderEdit' src='img/smallMeal.jpg' alt=''></a>
          <h4 style='text-align: center;'>Small Veg Tiffin</h4>
        </div>
        <div>
          <a href='' onclick='redirect();' ><img class='OrderEdit' src='img/MediumMeal.jpeg' alt=''></a>
          <h4 style='text-align: center;'>Medium Veg Tiffin</h4>
        </div>
        <div>
          <a href='' onclick='redirect();'><img class='OrderEdit' src='img/LargeMeal.jpg' alt=''></a>
          <h4 style='text-align: center;'>Large Veg Tiffin</h4>
        </div>
      </div>
      <br>
      <div class='orders'>
        <div>
          <a href='' onclick='redirect();'><img class='OrderEdit' src='img/nonvegMedium.jpeg' alt=''></a>
          <h4 style='text-align: center;'>Small Nonveg Tiffin</h4>
        </div>
        <div>
          <a href='' onclick='redirect();'><img class='OrderEdit' src='img/nonvegSmall.jpeg' alt=''></a>
          <h4 style='text-align: center;'>Medium Nonveg Tiffin</h4>
        </div>
        <div>
          <a href='' onclick='redirect();'><img class='OrderEdit' src='img/nonvedLarge.jpeg' alt=''></a>
          <h4 style='text-align: center;'>Large Nonveg Tiffin</h4>
        </div> ";
    }
    ?>
    </div>
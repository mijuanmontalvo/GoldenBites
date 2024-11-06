  <!-- header -->
<?php require('partials/head.php')?> 
  <!-- navigation -->
<?php require('partials/nav.php')?> 
  <!-- Banner -->
<?php require('partials/banner.php')?> 
<section class="gallery" >


        <ul class="tripList trips">
      <li>
      <img src="images/Dishcard1.png" alt="Dish 1">
        <h3>Our Dishes</h3>
        <p>Discover our delicious variety of dishes, carefully selected to satisfy all tastes. From traditional options to more contemporary flavours. Explore our list of dishes and choose your favourites to enjoy a unique culinary experience.</p>
        <a href="/ourdishes">Check out our dishes<i class="fas fa-angle-double-right"></i></a>
      </li>
      <li>
      <img src="images/Reservationcard1.png" alt="Dish 1">
        <h3>Reservations</h3>
        <p>Book your dishes quickly and easily. Select your favorite options and make sure they are ready for you whenever you want. Our reservation platform is extremely simple and is enabled right now.</p>
        <a href="/reservation">Check out your reservations<i class="fas fa-angle-double-right"></i></a>
      </li>

    </ul>

    <?php     if ($_SESSION['UserType']=="Kitchen"){
    
} else if($_SESSION['UserType']=="Guest"){
  ?>
  <div class="addnewdish">
  <a href="/makereservation"  class="btn text-blue-500 hover:underline boton">
  Reserve our delicious dishes
  </a>
  </div> 
  
  <?php
}  ?>



<br>
<br>
    <div class="galleryWrap">
        <img src="images/Dish1.png" alt="Dish 1">
        <img src="images/Dish2.png" alt="Dish 2">
        <img src="images/Dish3.png" alt="Dish 3">
        <img src="images/Dish4.png" alt="Dish 4">
        <img src="images/Dish5.png" alt="Dish 5">
        <img src="images/Dish6.png" alt="Dish 6">

    </div>


  </section>


  <!-- Footer -->
<?php require('partials/footer.php')?>

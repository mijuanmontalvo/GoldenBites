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

    <?php

$menu = [
    ["lunch" => "Poutine with Maple Tart", "dinner" => "Tourtière with Butter Tarts"],
    ["lunch" => "Pea Soup with Nanaimo Bars", "dinner" => "Roast Beef with Blueberry Grunt"],
    ["lunch" => "Caesar Salad with Butter Tarts", "dinner" => "Maple-glazed Salmon with Nanaimo Bars"],
    ["lunch" => "Montreal Smoked Meat with Date Squares", "dinner" => "Chicken Pot Pie with Maple Syrup Pie"],
    ["lunch" => "Fish and Chips with Sugar Pie", "dinner" => "BBQ Ribs with Blueberry Cobbler"],
    ["lunch" => "Lobster Roll with Blueberry Cheesecake", "dinner" => "Steak Frites with Maple Cake"],
    ["lunch" => "Bison Burger with Saskatoon Berry Tart", "dinner" => "Roast Duck with Date Cake"]
];


$currentDate = new DateTime();
?>

<section class="menu-section">
    <h2>Regular Weekly Menu</h2>
    <br>
    <div class="menu-grid">
        <?php foreach ($menu as $index => $dayMenu) : ?>
            <?php
                
                $date = clone $currentDate;
                $date->modify("+$index day");
                
                
                $formattedDate = $date->format('D, M j, Y');
            ?>
            <div class="menu-card">
                <h3><?php echo $formattedDate; ?></h3>
                <p><strong>Lunch:</strong> <?php echo $dayMenu['lunch']; ?></p>
                <p><strong>Dinner:</strong> <?php echo $dayMenu['dinner']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    
    

</section>

<h2 class="extramenu">Extra Menu</h2>
<br>
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


<style>
/* General styling */
.menu-section {
    margin: 10px auto;
    margin-bottom: 100px;
    padding: 10px;
    text-align: center;
    font-family: Arial, sans-serif;
}

.menu-section h2 {
    color: #333;
    font-size: 1.8rem;
}

/* Grid layout */
.menu-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
    max-width: 1200px;
    margin: 0 auto;
}

/* Menu cards */
.menu-card {
    background-color: #f9f9f9;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border: 1px solid #ccc;
    
}

.menu-card h3 {
    font-size: 1.5rem;
    color: #007bff;
    margin-bottom: 10px;
}

.menu-card p {
    font-size: 1rem;
    color: #555;
}

/* Button styling */
.addnewdish a {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #223054;
    color: white;
    border-radius: 5px;
    font-size: 16px;
    text-decoration: none;
    transition: background-color 0.3s;
}

.addnewdish a:hover {
    background-color: #0056b3;
}

.extramenu {

text-align: center;
}

/* Responsive design for mobile */
@media (max-width: 768px) {
  .menu-section {
    margin: 0px auto;
    margin-bottom: 50px;

}

    .menu-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;

    }

    .menu-card h3 {
        font-size: 1.2rem;
    }

    .menu-card p {
        font-size: 0.9rem;
    }
}


</style>
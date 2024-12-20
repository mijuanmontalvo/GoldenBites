  <!-- header -->
<?php require('partials/head.php')?> 

  <!-- navigation -->
<?php require('partials/nav.php')?> 
  <!-- Baner -->
<?php require('partials/banner.php')?> 




<section class="trips" id="trip">


        <br>
<hr>
<br>
<h2>List of special dishes</h2>
<br>
<hr>
<table class="table_dish" style="width:100%">
  <tr>
    
    <th>Name</th>
    <th>Description</th>
    <th>Price ($)</th>
    <th>Image</th>
    <th></th>
  </tr>
 
<?php
include 'db_connect.php';


$sql = "SELECT ID, name, description, price, image 
        FROM dish 
        order by ID desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    
    echo "<tr>";
    
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . number_format($row['price'],2) . "</td>";
    echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['image']) . "'/></td>";
    echo "<td>" ." <a href=/makereservationfromdish?id=$row[ID] class='card_dish-edit'>Reserve it</a>" . "</td>";
    echo "</tr>";
  }
} else {
  echo "0 resultados";
}
$conn->close();






?>

</table>

  </section>


    
<?php 
include 'db_connect.php';
$sql = "SELECT ID, name, description, price, image 
        FROM dish 
        ORDER BY ID DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  while ($row = $result->fetch_assoc()) {
    echo "<div class='card_dish'>";
    echo "<img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='Dish Image' class='card-image'/>";
    echo "<div class='card_dish-body'>";
    echo "<h3 class='card_dish-title'>" . $row['name'] . "</h3>";
    echo "<p class='card_dish-description'>" . $row['description'] . "</p>";
    echo "<p class='card_dish-price'>$" . number_format($row['price'], 2) . "</p>";
    echo "<a href='/makereservationfromdish?id={$row['ID']}' class='card_dish-edit'>Reserve it</a>";
    echo "</div>";
    echo "</div>";
  }
} else {
  echo "<p>No results found.</p>";
}
$conn->close();




?>
  <!-- Footer -->

<?php require('partials/footer.php')?>
  <!-- header -->
<?php require('partials/head.php')?> 
  <!-- navigation -->
<?php require('partials/nav.php')?> 
  <!-- Baner -->
<?php require('partials/banner.php')?> 
<section class="gallery" >
        <li>
            <a href="/addnewdish" class="text-blue-500 hover:underline">
            Add a new dish
            </a>
        </li>
        <br>
<hr>
<br>
<h2>Dish Table</h2>
<hr>
<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Description</th>
    <th>Price ($)</th>
    <th>Image</th>
  </tr>
 
<?php

include 'db_connect.php';


$sql = "SELECT ID, name, description, price, image FROM dish order by ID desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    
    echo "<tr>";
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['image']) . "'/></td>";
    echo "</tr>";
  }
} else {
  echo "0 resultados";
}
$conn->close();
?>

</table>

  </section>


  <!-- Footer -->
<?php require('partials/footer.php')?>
  <!-- header -->
<?php require('partials/head.php')?> 

  <!-- navigation -->
<?php require('partials/nav.php')?> 

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
// Crear conexión
include 'db_connect.php';



// Consulta para seleccionar todos los datos de la tabla
$sql = "SELECT ID, name, description, price, image FROM dish order by ID desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Imprimir los datos en una tabla
  
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
<!-- Contact Info -->
<?php //require('partials/footer.contact.php')?>
<?php require('partials/footer.php')?>
 <!-- header -->
<?php require('partials/head.php')?> 
  <!-- navigation -->
<?php require('partials/nav.php')?> 
  <!-- Baner -->
<?php require('partials/banner.php')?> 
<section class="trips" id="trips">

<?php
$servername = "localhost";
$username = "food_reservation";
$password = "1234";
$dbname = "goldenbites";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT ID, Name FROM dish";
$result = $conn->query($sql);



?>
    
      <h2>Enter your reservation details</h2>
      <br>

      <form action="/insertar_reservation" method="post">
      <label for="plato">Name of dish:</label><br>
    <select id="name_dish" name="name_dish">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["ID"] . '">' . $row["Name"] . '</option>';
            }
        }
        ?>
    </select><br><br>

    <label for="fecha">Reservation Date and Time:</label><br>
    <input type="datetime-local" id="reservation_date" name="reservation_date"><br><br>

    <label for="cantidad">Number of dishes:</label><br>
    <input type="number" id="number_dishes" name="number_dishes" min="1" value="1" required><br><br>

    <label for="observacion">Observation:</label><br>
    <textarea id="observation" name="observation" rows="4" cols="50"></textarea><br><br>



    <input type="submit" value="Reserve">
</form>

  </section>


  <!-- Footer -->
<?php require('partials/footer.php')?>

  <!-- header-->
<?php require('partials/head.php')?> 

  <!-- navigation -->
  <?php require('partials/nav.php')?> 

  <!-- Baner -->
  <?php require('partials/banner.php')?> 

  <?php
 /* echo $_SESSION['UserType']."--";

  echo $_SESSION['ID']."--";*/
$userID=$_SESSION['ID'];

?>


<section class="trips" id="trip">

    
            <div class="addnewdish">
            <a href="/makereservation"  class="btn text-blue-500 hover:underline boton">
            Add a new reservation
            </a>
            </div> 

        <br>
<hr>
<br>
<h2>Reservations List</h2>
<br>
<hr>
<table class="table_reservation" style="width:100%">
  <tr>
  <th>Date</th>
    <th>User Name</th>
    <th>Room Number</th>
    <th>Name Dish</th>
    
    
    <th>Number Dish</th>
    <th>Observation</th>
    
    <th></th>
  </tr>
 
<?php
include 'db_connect.php';
$currentDate = date('Y-m-d');

$sql = "SELECT reservation.ID as Reservation_ID, UserID, DishID, DateReservation, NumberDish, Observation, Estate, 
               user.Name as Name_user, user.RoomNumber as Room_Number, dish.Name as Name_Dish 
        FROM reservation, user, dish
        WHERE reservation.userID=user.ID and
              reservation.dishID=dish.ID and
              
              reservation.DateReservation >= '$currentDate' and
              UserID=$userID
         order by Reservation_ID desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    
    echo "<tr>";
   // echo "<td>" . $row['Reservation_ID'] . "</td>";
   echo "<td>" . $row['DateReservation'] . "</td>";
   echo "<td>" . $row['Name_user'] . "</td>";
   echo "<td>" . $row['Room_Number'] . "</td>";
    echo "<td>" . $row['Name_Dish'] . "</td>";
   // echo "<td>" . $row['DishID'] . "</td>";
    
    echo "<td>" . $row['NumberDish'] . "</td>";
    echo "<td>" . $row['Observation'] . "</td>";
    //echo "<td>" . $row['Estate'] . "</td>";
    echo "<td>" ." <a href=/editreservation?id=$row[Reservation_ID] class='card_dish-edit'>Edit</a>  <a href=/deletereservation?id=$row[Reservation_ID] class='card_dish-edit'>Cancel</a>" . "</td>";
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
$sql = "SELECT reservation.ID as Reservation_ID, UserID, DishID, DateReservation, NumberDish, 
               Observation, Estate, 
               user.Name as Name_user, user.RoomNumber as Room_Number, dish.Name as Name_Dish, dish.Image as Image
        FROM reservation, user, dish
        WHERE reservation.userID=user.ID and
              reservation.dishID=dish.ID and
              reservation.DateReservation >= '$currentDate' and
              UserID=$userID
         order by Reservation_ID desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  while ($row = $result->fetch_assoc()) {
    echo "<div class='card_dish'>";
    
    echo "<div class='card_dish-body'>";
    echo "<h3 class='card_dish-title'>"."Dish: " . $row['Name_Dish'] . "</h3>";
    echo "<p class='card_dish-description'>"."User Name: " . $row['Name_user'] . "</p>";
    echo "<p class='card_dish-description'>"."Room Number: " . $row['Room_Number'] . "</p>";
    echo "<p class='card_dish-description'>"."Number of dishes: " . $row['NumberDish'] . "</p>";
    echo "<p class='card_dish-description'>"."Observation: " . $row['Observation'] . "</p>";
    echo "<p class='card_dish-description'>"."Date: " . $row['DateReservation'] . "</p>";

    echo "<a href='/editreservation?id={$row['Reservation_ID']}' class='card_dish-edit'>Edit</a>  <a href='/deletereservation?id={$row['Reservation_ID']}' class='card_dish-edit'>Cancel</a>";
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
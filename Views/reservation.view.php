
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


    <section class="gallery" >

    
            <div class="addnewdish">
            <a href="/makereservation"  class="text-blue-500 hover:underline boton">
            Add a new reservation
            </a>
            </div> 

        <br>
<hr>
<br>
<h2>Dish Table</h2>
<hr>
<table style="width:100%">
  <tr>
    <th>Reservation Id</th>
    <th>Dish Id</th>
    <th>Date reservation</th>
    <th>Number Dish</th>
    <th>Observation</th>
    
    <th>Operations</th>
  </tr>
 
<?php
include 'db_connect.php';


$sql = "SELECT reservation.ID as Reservation_ID, UserID, DishID, DateReservation, NumberDish, Observation, Estate, 
               user.Name as Name_user, dish.Name as Name_Dish 
        FROM reservation, user, dish
        WHERE reservation.userID=user.ID and
              reservation.dishID=dish.ID and
              UserID=$userID
         order by Reservation_ID desc";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    
    echo "<tr>";
    echo "<td>" . $row['Reservation_ID'] . "</td>";
    echo "<td>" . $row['Name_Dish'] . "</td>";
    echo "<td>" . $row['DateReservation'] . "</td>";
    echo "<td>" . $row['NumberDish'] . "</td>";
    echo "<td>" . $row['Observation'] . "</td>";
    //echo "<td>" . $row['Estate'] . "</td>";
    echo "<td>" ." <a href=/editreservation?id=$row[Reservation_ID]>Edit</a> | <a href=/deletereservation?id=$row[Reservation_ID]>Delete</a>" . "</td>";
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
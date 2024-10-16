  <!-- header-->
  <?php require('partials/head.php')?> 
  <!-- navigation -->
<?php require('partials/nav.php')?> 
  <!-- Baner -->
<?php require('partials/banner.php') ?> 

<?php 
include 'db_connect.php';

$sql = "SELECT ID, UserID, DishID, DateReservation, NumberDish, Observation, Estate 
        FROM reservation 
        where ID=$ID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$UserID=$row['UserID'];
$DishID=$row['DishID'];
$DateReservation=$row['DateReservation'];
$NumberDish=$row['NumberDish'];
$Observation=$row['Observation'];
$Estate=$row['Estate'];

/*$image=base64_encode($image);*/
} else {
    echo "0 resultados";
  }

  $sql2 = "SELECT reservation.ID, UserID, DishID, DateReservation, NumberDish, Observation, Estate,
                  dish.name as dishName
           FROM reservation, dish 
           where reservation.DishID= dish.ID and reservation.ID=$ID";
  $result2 = $conn->query($sql2);
  
  if ($result2->num_rows > 0) {
  $row = $result2->fetch_assoc();
  $UserID=$row['UserID'];
  $DishID=$row['DishID'];
  $DateReservation=$row['DateReservation'];
  $NumberDish=$row['NumberDish'];
  $Observation=$row['Observation'];
  $Estate=$row['Estate'];
  $dishName=$row['dishName'];
  

  } else {
      echo "0 resultados";
    }

    $sql3 = "SELECT ID, Name FROM dish";
    $result3 = $conn->query($sql3);

  $conn->close();


?> 

<section class="gallery" >
        
        <h2>Edit the data of the reservation</h2>
      <br>

      <form action="/inserteditreservation" method="post">
      <input type="hidden" name="ID" value="<?php echo $ID;?>">
      <input type="hidden" name="UserID" value="<?php echo $UserID;?>">
      <label for="plato">Name of dish:</label><br>
    <select id="name_dish" name="name_dish">
        <?php
        if ($result3->num_rows > 0) {
                echo '<option value="' . $DishID. '">' . $dishName . '</option>';
            while ($row3 = $result3->fetch_assoc()) {
                echo '<option value="' . $row3["ID"] . '">' . $row3["Name"] . '</option>';
            }
        }
        ?>
    </select><br><br>

    <label for="fecha">Reservation Date and Time:</label><br>
    <input type="datetime-local" id="reservation_date" name="reservation_date" value="<?php echo $DateReservation; ?>"><br><br>

    <label for="cantidad">Number of dishes:</label><br>
    <input type="number" id="number_dishes" name="number_dishes" min="1" value="<?php echo $NumberDish;?>" required><br><br>

    <label for="observacion">Observation:</label><br>
    <textarea id="observation" name="observation"  rows="4" cols="50"><?php echo $Observation;?></textarea><br><br>



    <input type="submit" value="Edit">
</form>




  </section>


  <!-- Footer -->
<?php require('partials/footer.php')?>
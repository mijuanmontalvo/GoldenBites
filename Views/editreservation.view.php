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

<section class="trips" id="trip" >
        
        <h2>Edit the data of the reservation</h2>
        <br>
        <hr>
        <br>

      <form action="/inserteditreservation" method="post">
      <input type="hidden" name="ID" value="<?php echo $ID;?>">
      <input type="hidden" name="UserID" value="<?php echo $UserID;?>">
      <label for="plato">Name of dish:</label>
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

    <label for="fecha">Reservation Date and Time:</label>
    <input type="datetime-local" id="reservation_date" name="reservation_date" value="<?php echo $DateReservation; ?>"><br><br>

    <label for="cantidad">Number of dishes:</label>
    <input type="number" id="number_dishes" name="number_dishes" min="1" value="<?php echo $NumberDish;?>" required><br><br>

    <label for="observacion">Observation:</label>
    <textarea id="observation" name="observation"  rows="4" cols="50"><?php echo $Observation;?></textarea><br><br>



    <input type="submit" value="Edit">
    <a id="btn-for"  href="/reservation"><< Back</a>
</form>




  </section>


  <!-- Footer -->
<?php require('partials/footer.php')?>


<script>
// Function to validate form
function validateForm() {
    // Get fields vsalues
    const reservationDate = document.getElementById('reservation_date').value;
    const numberDishes = document.getElementById('number_dishes').value;
    const observation = document.getElementById('observation').value;

    // Validate date field (not empty)
    if (!reservationDate) {
        alert("The 'Reservation Date and Time' field is required.");
        return false;
    }

    // Validate number of plates (must be a positive numerical value)
    if (isNaN(numberDishes) || numberDishes <= 0 || !Number.isInteger(Number(numberDishes))) {
        alert("The 'Number of dishes' field must be a positive integer.");
        return false;
    }

    // Validate length of observation field (maximum 100 characters)
    if (observation.length > 100) {
        alert("The 'Observation' field cannot exceed 100 characters.");
        return false;
    }

    // If all validations pass, the form is allowed to be submitted.
    return true;
}
</script>



<style>

form {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    font-family: Arial, sans-serif;
    border: 1px solid #ccc;
}

/* Styles for labels and inputs */
form label {
    font-weight: bold;
    color: #333;
    display: block;
    margin-bottom: 2px;
}

form input[type="text"],
form input[type="number"],
form input[type="datetime-local"],
form select,
form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s;
}

form input[type="text"]:focus,
form input[type="number"]:focus,
form input[type="datetime-local"]:focus,
form select:focus,
form textarea:focus {
    border-color: #007bff;
    outline: none;
}

/* Submit button */
form input[type="submit"],
form a {
    display: inline-block;
    width: 48%;
    padding: 10px;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    color: white;
    background-color: #223054;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

/*#btn-form {
    float: left;
    margin-left: 10px;
    padding: .5rem;
    text-decoration: none;
    color: #fff;

}*/

form input[type="submit"]:hover,
form a:hover {
    background-color: #0056b3;
}

/* Back button */
form a {
    background-color: #6c757d;
}

form a:hover {
    background-color: #5a6268;
}

/* Mobile responsiveness */
@media (max-width: 768px) {
    form {
        padding: 15px;
    }

    form input[type="submit"],
    form a {
        width: 100%;
        margin-top: 10px;
    }
}
</style>
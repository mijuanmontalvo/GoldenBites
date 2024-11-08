
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



        <br>
<hr>
<br>
<h2>Reservations List</h2>
<br>

<!-- Date Filter Form -->
<form method="POST" action="" onsubmit="return validateDateTimeInputs()" class="filter-form">
    <div class="form-group">
        <label for="startDate">Start Date-Time:</label>
        <input type="datetime-local" id="startDate" name="startDate" required>
    </div>

    <div class="form-group">
        <label for="endDate">End Date-Time:</label>
        <input type="datetime-local" id="endDate" name="endDate" required>
    </div>

    <input type="submit" value="Filter">
</form>
<br>
<hr>
<table class="table_reservation" style="width:100%">
  <tr>
    
    <th>Name Dish</th>
    
    <th>Date reservation</th>
    <th>Number Dish</th>
    <th>Observation</th>
    
    <th>Operations</th>
  </tr>
 
<?php
include 'db_connect.php';
$currentDate = date('Y-m-d');


$sql = "SELECT reservation.ID as Reservation_ID, UserID, DishID, DateReservation, NumberDish, Observation, Estate, 
               user.Name as Name_user, dish.Name as Name_Dish 
        FROM reservation, user, dish
        WHERE reservation.userID=user.ID and
              reservation.dishID=dish.ID and 
              reservation.DateReservation >= '$currentDate'
         order by Reservation_ID desc";

      // If filter dates are submitted, adjust the query to filter between those dates
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['startDate']) && isset($_POST['endDate'])) {
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        $sql = "SELECT reservation.ID as Reservation_ID, UserID, DishID, DateReservation, NumberDish, Observation,
                       user.Name as Name_user, dish.Name as Name_Dish 
                FROM reservation, user, dish
                WHERE reservation.userID = user.ID 
                  AND reservation.dishID = dish.ID 
                  AND reservation.DateReservation BETWEEN '$startDate' AND '$endDate'
                ORDER BY Reservation_ID DESC";
      }




$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    
    echo "<tr>";
   // echo "<td>" . $row['Reservation_ID'] . "</td>";
    echo "<td>" . $row['Name_Dish'] . "</td>";
   // echo "<td>" . $row['DishID'] . "</td>";
    echo "<td>" . $row['DateReservation'] . "</td>";
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
$currentDate = date('Y-m-d');


$sql = "SELECT reservation.ID as Reservation_ID, UserID, DishID, DateReservation, NumberDish, 
               Observation, Estate, 
               user.Name as Name_user, dish.Name as Name_Dish, dish.Image as Image
        FROM reservation, user, dish
        WHERE reservation.userID=user.ID and
              reservation.dishID=dish.ID and 
              reservation.DateReservation >= '$currentDate'
         order by Reservation_ID desc";

      // If filter dates are submitted, adjust the query to filter between those dates
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['startDate']) && isset($_POST['endDate'])) {
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        $sql = "SELECT reservation.ID as Reservation_ID, UserID, DishID, DateReservation, NumberDish, Observation,
                       user.Name as Name_user, dish.Name as Name_Dish 
                FROM reservation, user, dish
                WHERE reservation.userID = user.ID 
                  AND reservation.dishID = dish.ID 
                  AND reservation.DateReservation BETWEEN '$startDate' AND '$endDate'
                ORDER BY Reservation_ID DESC";
      }



$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  while ($row = $result->fetch_assoc()) {
    echo "<div class='card_dish'>";
    
    echo "<div class='card_dish-body'>";
    echo "<h3 class='card_dish-title'>"."Dish: " . $row['Name_Dish'] . "</h3>";
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

<script>
    // Function to validate date inputs
    function validateDateInputs() {
      const startDate = document.getElementById('startDate').value;
      const endDate = document.getElementById('endDate').value;
      
      if (!startDate || !endDate) {
        alert("Both start and end dates must be filled.");
        return false;
      }
      
      const dateTimePattern = /^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}$/;
      
      if (!dateTimePattern.test(startDateTime) || !dateTimePattern.test(endDateTime)) {
        alert("Please enter date-times in the correct format (YYYY-MM-DDTHH:MM).");
        return false;
      }

      if (new Date(startDate) > new Date(endDate)) {
        alert("The start date cannot be later than the end date.");
        return false;
      }
      
      return true;
    }
  </script>

<style>
/* Styles for filter form in a single row */
.filter-form {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    gap: 10px;
    max-width: 100%;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    font-family: Arial, sans-serif;
    border: 1px solid #ccc;
}

.form-group {
    display: flex;
    flex-direction: column;
    margin: 0 5px;
}

/* Inline label and input for larger screens */
@media (min-width: 768px) {

    .form-group {
        flex-direction: row;
        align-items: center;
    }
    .form-group label {
        margin-right: 10px;
    }
}

.filter-form label {
    font-weight: bold;
    color: #333;
}

.filter-form input[type="datetime-local"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    transition: border-color 0.3s;
    width: 100%;
}

/* Submit button */
.filter-form input[type="submit"] {
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    color: white;
    background-color: #223054;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

/* Hover effects */
.filter-form input[type="datetime-local"]:focus {
    border-color: #007bff;
    outline: none;
}

.filter-form input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .filter-form {
        flex-direction: column;
        align-items: stretch;
    }
    .form-group {
        width: 100%;
    }
    .filter-form input[type="submit"] {
        width: 100%;
    }
}
</style>
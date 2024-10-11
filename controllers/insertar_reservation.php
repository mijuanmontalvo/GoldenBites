<?php
include '../functions.php';
$conn = conectarBD();

$userID=$_SESSION['ID'];

$name_dish = $_POST['name_dish'];
$reservation_date = $_POST['reservation_date'];
$number_dishes = $_POST['number_dishes'];
$observation = $_POST['observation'];
$estate="Initialized";

$sql = "INSERT INTO goldenbites.reservation (UserID, DishID, DateReservation, NumberDish, Observation, Estate) 
        values('$userID','$name_dish','$reservation_date','$number_dishes','$observation','$estate')";

if ($conn->query($sql) === TRUE) {
    header("Location: /reservationsmade");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }



$conn->close();
?>
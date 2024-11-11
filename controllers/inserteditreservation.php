<?php
session_start();
include 'db_connect.php';

$ID = $_POST['ID'];
$userID = $_POST['UserID'];
$dishID = $_POST['name_dish'];
$reservation_date = $_POST['reservation_date'];
$number_dishes = $_POST['number_dishes'];
$observation = $_POST['observation'];

echo $ID."--";
echo $userID."--";
echo $dishID."--";
echo $reservation_date."--";
echo $number_dishes."--";
echo $observation;

$sql = "UPDATE reservation 
        SET DishID='$dishID', DateReservation='$reservation_date', NumberDish=$number_dishes,
            Observation='$observation'
        WHERE ID=$ID";  
if ($conn->query($sql) === TRUE) {
    //header("Location: /reservation");
    echo "<script>window.location.href = '/reservation';</script>";
    echo "exito";
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();



/*
 if (empty($_FILES['image_dish']['name'])){

    echo "la imagen es cero";
    $sql = "UPDATE goldenbites.dish 
    SET Name='$name', Description='$description', Price=$price
    WHERE ID=$ID";

}else{
    $image_dish = addslashes(file_get_contents($_FILES['image_dish']['tmp_name']));
    $sql = "UPDATE goldenbites.dish 
    SET Name='$name', Description='$description', Price=$price, Image='$image_dish'
    WHERE ID=$ID";  
}




if ($conn->query($sql) === TRUE) {
    header("Location: /ourdishes");
    echo "exito";
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();*/
?>
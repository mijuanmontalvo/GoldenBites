<?php
session_start();
include '../functions.php';
$conn = conectarBD();

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];


$image_dish = addslashes(file_get_contents($_FILES['image_dish']['tmp_name']));

$sql = "INSERT INTO goldenbites.dish (Name, Description, Price, Image) 
        values('$name','$description','$price','$image_dish')";

if ($conn->query($sql) === TRUE) {

    header("Location: /ourdishes");
    echo "exito";
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();
?>
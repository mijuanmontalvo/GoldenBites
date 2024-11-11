<?php
session_start();
include 'db_connect.php';

$ID = $_POST['ID'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

 if (empty($_FILES['image_dish']['name'])){

    echo "la imagen es cero";
    $sql = "UPDATE dish 
    SET Name='$name', Description='$description', Price=$price
    WHERE ID=$ID";

}else{
    $image_dish = addslashes(file_get_contents($_FILES['image_dish']['tmp_name']));
    $sql = "UPDATE dish 
    SET Name='$name', Description='$description', Price=$price, Image='$image_dish'
    WHERE ID=$ID";  
}




if ($conn->query($sql) === TRUE) {
    //header("Location: /ourdishes");
    echo "<script>window.location.href = '/ourdishes';</script>";
    echo "exito";
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();
?>
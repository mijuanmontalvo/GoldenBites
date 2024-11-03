<?php
session_start();
include '../functions.php';
$conn = conectarBD();

$type_user = $_POST['type_user'];
$name_usuario = $_POST['name_usuario'];
$room_number = $_POST['room_number'];
$email = $_POST['email'];
$user_name = $_POST['user_name'];
$password = $_POST['password'];


$sql = "SELECT * FROM goldenbites.user WHERE UserName = '$user_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {


  // If the username already exists, display an error message
  echo "<script>alert('El nombre de usuario ya está en uso. Por favor, elige otro.');</script>";
  echo "<script>window.history.back();</script>";
} else {
// Si el nombre de usuario no existe, procede a registrar la cuenta

$sql = "INSERT INTO goldenbites.user (UserType, Name, RoomNumber, email, UserName, Password) 
        values('$type_user','$name_usuario','$room_number','$email','$user_name','$password')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['name_usuario'] = $name_usuario;
    header("Location: /");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

}
$conn->close();
?>
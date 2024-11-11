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
$kitchen_code = $_POST['kitchen_code'];



$sql = "SELECT * FROM user WHERE UserName = '$user_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {


  // If the username already exists, display an error message
  echo "<script>alert('The username is already in use. Please choose another one.');</script>";
  echo "<script>window.history.back();</script>";
} else {
// If the username does not exist, proceed to register the account

$sql = "INSERT INTO user (UserType, Name, RoomNumber, email, UserName, Password) 
        values('$type_user','$name_usuario','$room_number','$email','$user_name','$password')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['name_usuario'] = $name_usuario;
    //header("Location: /");
    echo "<script>window.location.href = '/';</script>";
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

}
$conn->close();
?>
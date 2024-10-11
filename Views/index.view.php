<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoldenBites</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php

    ?>

        <div class="login-container">

            <form name="frmLogin" method="post">
            <div class="divimage">
            <img src="images/logo2.png" alt="MAR logo" class="logo">
            </div>
            <h1>Log in</h1> 
            <hr>   
                
                <label>User</label>
                <input type="text" name="username" placeholder="Enter your username">
                
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password">
                <hr>
                <button type="submit">Log in</button>
                <a href="registrarcuenta">Create Account</a>
            </form>
        </div>
    </body>
</html>


<?php
session_start();


include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM goldenbites.user where UserName = '$username' and Password = '$password'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($result->num_rows == 1) {
        // Inicio de sesión exitoso
        $_SESSION['username'] = $username;
        $_SESSION['ID']=$row['ID'];
        $_SESSION['UserType']=$row['UserType'];
        $_SESSION['Name']=$row['Name'];
        $_SESSION['RoomNumber']=$row['RoomNumber'];
        $_SESSION['email']=$row['email'];
        header("Location: /home");
    } else {
        $mensaje_error = "Usuario y/o contraseña incorrectos.";
        echo "<script>alert('Incorrect username and/or password, please try again.');</script>";
        echo "<script>window.location.href = '/';</script>";
    }
}

$conn->close();





?>

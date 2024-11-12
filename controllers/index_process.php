<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario_valido = "username"; 
    $contrasena_valida = "password"; 
  
    $password = $_POST['password'];

    if ($username === $usuario_valido && $password === $contrasena_valida) {
        
        //header("Location: home");
        echo "<script>window.location.href = '/home';</script>";
        exit;
    } else {
        
        echo "<script>alert('Usuario o contraseña incorrectos.');</script>";
        
    }
  }
?>
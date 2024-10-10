<?php

$servername = "localhost";
$username = "food_reservation";
$password = "1234";
$dbname = "goldenbites";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}



?>
<?php 



function urlIs($value){
    return $_SERVER['REQUEST_URI']===$value;
}

function conectarBD() {
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

    return $conn;
}
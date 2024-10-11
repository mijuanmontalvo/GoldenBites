<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes =[
    '/'=>'controllers/index.php',
    '/home'=>'controllers/home.php',
    '/index_process'=>'controllers/index_process.php',
    '/registrarcuenta'=>'controllers/registrarcuenta.php',
    '/ourdishes'=>'controllers/ourdishes.php',
    '/manageourdishes'=>'controllers/manageourdishes.php',
    '/addnewdish'=>'controllers/addnewdish.php',
    '/reservation'=>'controllers/reservation.php',
    '/makereservation'=>'controllers/makereservation.php',
    '/reservationsmade'=>'controllers/reservationsmade.php',


];

function routeToController($uri, $routes){
    if (array_key_exists($uri, $routes)){
        require $routes[$uri];
    } else {
    abort();
    }
}

function abort($code = 404){
    http_response_code($code);

    require "views/{$code}.php";

    die();
}

routeToController($uri, $routes);
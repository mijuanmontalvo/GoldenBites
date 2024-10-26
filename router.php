<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes =[
    '/'=>'controllers/index.php',
    '/home'=>'controllers/home.php',
    '/index_process'=>'controllers/index_process.php',
    '/makereservation'=>'controllers/makereservation.php',
    '/makereservationfromdish'=>'controllers/makereservationfromdish.php',
    '/insertar_reservation'=>'controllers/insertar_reservation.php',
    '/registrarcuenta'=>'controllers/registrarcuenta.php',
    '/ourdishes'=>'controllers/ourdishes.php',
    '/manageourdishes'=>'controllers/manageourdishes.php',
    '/addnewdish'=>'controllers/addnewdish.php',
    '/insertnewdish'=>'controllers/insertnewdish.php',
    '/reservation'=>'controllers/reservation.php',
    '/reservationkitchen'=>'controllers/reservationkitchen.php',
    '/reservationsmade'=>'controllers/reservationsmade.php',
    '/editdish'=>'controllers/editdish.php',
    '/inserteditdish'=>'controllers/inserteditdish.php',
    '/deletedish'=>'controllers/deletedish.php',
    '/editreservation'=>'controllers/editreservation.php',
    '/inserteditreservation'=>'controllers/inserteditreservation.php',
    '/deletereservation'=>'controllers/deletereservation.php',

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
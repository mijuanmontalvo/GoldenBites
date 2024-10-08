<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes =[
    '/'=>'controllers/index.php',
    '/home'=>'controllers/home.php',
    '/registrarcuenta'=>'controllers/registrarcuenta.php',


];


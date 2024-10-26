<?php
session_start();
$heading = "Reservation";
$heading2 = "You can make a reservation for our food or review your reservations already made";


if ($_SESSION['UserType']=="Kitchen"){
    require "views/reservation.kitchen.view.php"; 
} else if($_SESSION['UserType']=="Guest"){
    require "views/reservation.guest.view.php"; 
}
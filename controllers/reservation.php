<?php
session_start();
$heading = "Reservation";
$heading2 = "You can make a reservation for our food or review your reservations already made. Book your dishes quickly and easily. Select your favorite options and make sure they are ready for you whenever you want. Our reservation platform is extremely simple and is enabled right now.";


if ($_SESSION['UserType']=="Kitchen"){
    require "Views/reservation.kitchen.view.php"; 
} else if($_SESSION['UserType']=="Guest"){
    require "Views/reservation.guest.view.php"; 
}
<?php
session_start();
$heading = "Make reservation";
$heading2 = "You can make a reservation for our food or review your reservations already made. Book your dishes quickly and easily. Select your favorite options and make sure they are ready for you whenever you want. Our reservation platform is extremely simple and is enabled right now.";
$ID=$_GET["id"];

require "views/makereservationfromdish.view.php";
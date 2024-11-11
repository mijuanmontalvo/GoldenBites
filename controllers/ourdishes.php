<?php
session_start();
$heading = "Our dishes";
$heading2 = "Only the better dishes for you. Discover our delicious variety of dishes, carefully selected to satisfy all tastes. From traditional options to more contemporary flavours. Explore our list of dishes and choose your favourites to enjoy a unique culinary experience.";



if ($_SESSION['UserType']=="Kitchen"){
    require "Views/ourdishes.kitchen.view.php";
} else if($_SESSION['UserType']=="Guest"){
    require "Views/ourdishes.guest.view.php";
}
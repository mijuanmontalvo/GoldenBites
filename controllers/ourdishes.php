<?php
session_start();
$heading = "Our dishes";
$heading2 = "Only the better dishes for you!";



if ($_SESSION['UserType']=="Kitchen"){
    require "views/ourdishes.kitchen.view.php";
} else if($_SESSION['UserType']=="Guest"){
    require "views/ourdishes.guest.view.php";
}
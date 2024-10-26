<?php
session_start();
$heading = "Our dishes";
$heading2 = "Only the better dishes for you!";



if ($_SESSION['UserType']=="Kitchen"){
    require "views/ourdishes.view.kitchen.php";
} else if($_SESSION['UserType']=="Guest"){
    require "views/ourdishes.view.guest.php";
}
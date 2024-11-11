<?php
session_start();
$heading = "Our dishes";
$heading2 = "Only the better dishes for you. Discover our delicious variety of dishes, carefully selected to satisfy all tastes. From traditional options to more contemporary flavours. Explore our list of dishes and choose your favourites to enjoy a unique culinary experience.";
$ID=$_GET["id"];
require "Views/editdish.view.php";


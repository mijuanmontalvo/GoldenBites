<?php
session_start();
$heading = "Make reservation";
$heading2 = "Enjoy our delicious dishes";
$ID=$_GET["id"];

require "views/makereservationfromdish.view.php";
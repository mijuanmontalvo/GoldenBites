<?php
session_start();
$heading = "Our dishes";
$heading2 = "Only the better dishes for you!";
$ID=$_GET["id"];
require "views/editdish.view.php";


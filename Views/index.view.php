<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoldenBites</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php

    ?>

        <div class="login-container">

            <form name="frmLogin" method="post">
            <div class="divimage">
            </div>
            <h1>Log in</h1> 
            <hr>   
                
                <label>User</label>
                <input type="text" name="username" placeholder="Enter your username">
                
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password">
                <hr>
                <button type="submit">Log in</button>
                <a href="registrarcuenta">Create Account</a>
            </form>
        </div>
    </body>
</html>


<?php
session_start();

?>

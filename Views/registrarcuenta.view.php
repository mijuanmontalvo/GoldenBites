<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoldenBites</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="login-container">
    <form action="/controllers/insertar_cuenta.php" method="post">
    <div class="divimage">
            <img src="images/logo2.png" alt="Logo GoldenBites" class="logo">
            </div>
    <h1>Register account</h1> 
    <hr>   
        <label>User type</label>
        <select name = "type_user">
            <option value="Guest">Guest</option>
            <option value="Kitchen">Kitchen</option>
        </select>   
        <label>Name</label>
        <input type="text" name="name_usuario" placeholder="Enter your name">
        <label>Room number</label>
        <input type="text" name="room_number" placeholder="Enter your email">
        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your email">
        <label>Username</label>
        <input type="text" name="user_name" placeholder="Create an username">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password">
    <hr>
        <button type="submit">Create account</button>
        <a href="/"><< Back</a>


    </form>
    </div>
</body>
</html>
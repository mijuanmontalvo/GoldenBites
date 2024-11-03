<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoldenBites</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
        // Función de validación del formulario
        function validateForm() {
            // Obtener valores de los campos
            const name = document.forms["frmRegister"]["name_usuario"].value.trim();
            const roomNumber = document.forms["frmRegister"]["room_number"].value.trim();
            const email = document.forms["frmRegister"]["email"].value.trim();
            const username = document.forms["frmRegister"]["user_name"].value.trim();
            const password = document.forms["frmRegister"]["password"].value.trim();
            
            // Expresiones regulares para validación
            const namePattern = /^[A-Za-z\s]+$/; // Solo letras y espacios
            const roomNumberPattern = /^[0-9]+$/; // Solo números
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // Formato de correo
            const usernamePattern = /^[a-zA-Z0-9._-]{4,}$/; // Letras, números, guión y punto, mínimo 4 caracteres
            const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/; // Letras y números, mínimo 6 caracteres
            
            // Validaciones de cada campo
            if (!name) {
                alert("El campo 'Name' es obligatorio.");
                return false;
            } else if (!namePattern.test(name)) {
                alert("El campo 'Name' solo debe contener letras y espacios.");
                return false;
            }

            if (!roomNumber) {
                alert("El campo 'Room number' es obligatorio.");
                return false;
            } else if (!roomNumberPattern.test(roomNumber)) {
                alert("El campo 'Room number' solo debe contener números.");
                return false;
            }

            if (!email) {
                alert("El campo 'Email' es obligatorio.");
                return false;
            } else if (!emailPattern.test(email)) {
                alert("El campo 'Email' debe tener un formato válido (ejemplo@dominio.com).");
                return false;
            }

            if (!username) {
                alert("El campo 'Username' es obligatorio.");
                return false;
            } else if (!usernamePattern.test(username)) {
                alert("El campo 'Username' debe tener al menos 4 caracteres y puede incluir letras, números, guiones y puntos.");
                return false;
            }

            if (!password) {
                alert("El campo 'Password' es obligatorio.");
                return false;
            } else if (!passwordPattern.test(password)) {
                alert("El campo 'Password' debe tener al menos 6 caracteres, incluyendo letras y números.");
                return false;
            }

            // Si todas las validaciones pasan
            return true;
        }
    </script>
</head>
<body>
<div class="login-container">
    <form name="frmRegister" action="/controllers/insertar_cuenta.php" method="post" onsubmit="return validateForm()">
        <div class="divimage">
            <img src="images/logo2.png" alt="Logo GoldenBites" class="logo">
        </div>
        <h1>Register account</h1> 
        <hr>   
        <label>User type</label>
        <select name="type_user">
            <option value="Guest">Guest</option>
            <option value="Kitchen">Kitchen</option>
        </select>   

        <label>Name</label>
        <input type="text" name="name_usuario" placeholder="Enter your name">

        <label>Room number</label>
        <input type="text" name="room_number" placeholder="Enter your room number">

        <label>Email</label>
        <input type="text" name="email" placeholder="Enter your email">

        <label>Username</label>
        <input type="text" name="user_name" placeholder="Create a username">

        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password">

        <hr>
        <button type="submit">Create account</button>
        <a href="/"><< Back</a>
    </form>
</div>
</body>
</html>

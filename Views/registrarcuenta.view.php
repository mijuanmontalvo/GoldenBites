<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoldenBites</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
        // Function to validate form
        function validateForm() {
            // Getting values of fields
            const name = document.forms["frmRegister"]["name_usuario"].value.trim();
            const roomNumber = document.forms["frmRegister"]["room_number"].value.trim();
            const email = document.forms["frmRegister"]["email"].value.trim();
            const username = document.forms["frmRegister"]["user_name"].value.trim();
            const password = document.forms["frmRegister"]["password"].value.trim();
            const userType = document.forms["frmRegister"]["type_user"].value;
            const kitchenCode = document.forms["frmRegister"]["kitchen_code"].value.trim();
            
            // Pattern to validations
            const namePattern = /^[A-Za-z\s]+$/; // Only letters and spaces
            const roomNumberPattern = /^[0-9]+$/; // Only numbers
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // email format
            const usernamePattern = /^[a-zA-Z0-9._-]{4,}$/; // Letters, numbers, hyphen and period, minimum 4 characters
            const passwordPattern = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/; // Letters, numbers, minimum 6 characters
            
            if (userType === "Kitchen") {
                // Validate kitchen code for "Kitchen" user type
                if (kitchenCode !== "abcd") {
                    alert("The 'Kitchen code' is incorrect. Please enter the correct code.");
                    return false;
                }

                if (!name) {
                alert("The 'Name' field is required.");
                return false;
            } else if (!namePattern.test(name)) {
                alert("The 'Name' field must only contain letters and spaces.");
                return false;
            }

                if (!email) {
                alert("The 'Email' field is required.");
                return false;
            } else if (!emailPattern.test(email)) {
                alert("The 'Email' field must be in a valid format (example@domain.com).");
                return false;
            }

            if (!username) {
                alert("The 'Username' field is required.");
                return false;
            } else if (!usernamePattern.test(username)) {
                alert("The 'Username' field must be at least 4 characters and can include letters, numbers, hyphens and periods.");
                return false;
            }

            if (!password) {
                alert("The 'Password' field is required.");
                return false;
            } else if (!passwordPattern.test(password)) {
                alert("The 'Password' field must be at least 6 characters, including letters and numbers.");
                return false;
            }



            } else if (userType === "Guest"){


            // Validation of each field
            if (!roomNumber) {
                alert("The 'Room number' field is required.");
                return false;
            } else if (!roomNumberPattern.test(roomNumber)) {
                alert("The 'Room number' field must only contain numbers");
                return false;
            }

            if (!name) {
                alert("The 'Name' field is required.");
                return false;
            } else if (!namePattern.test(name)) {
                alert("The 'Name' field must only contain letters and spaces.");
                return false;
            }



            if (!email) {
                alert("The 'Email' field is required.");
                return false;
            } else if (!emailPattern.test(email)) {
                alert("The 'Email' field must be in a valid format (example@domain.com).");
                return false;
            }

            if (!username) {
                alert("The 'Username' field is required.");
                return false;
            } else if (!usernamePattern.test(username)) {
                alert("The 'Username' field must be at least 4 characters and can include letters, numbers, hyphens and periods.");
                return false;
            }

            if (!password) {
                alert("The 'Password' field is required.");
                return false;
            } else if (!passwordPattern.test(password)) {
                alert("The 'Password' field must be at least 6 characters, including letters and numbers.");
                return false;
            }



        }

            // Show confirmation message
            const confirmMessage = "Do you want to confirm the creation of this account?";

    if (!confirm(confirmMessage)) {
        // Cancel submission if user does not confirm
        return false;
    }

            
            // If all validations pass.
            return true;
        }


                // Function to enable/disable fields based on user type selection
                function toggleFields() {
            const userType = document.forms["frmRegister"]["type_user"].value;
            const kitchenCodeField = document.getElementById("kitchenCodeField");
            const guestFields = document.getElementById("guestFields");

            if (userType === "Kitchen") {
                kitchenCodeField.style.display = "block";
                guestFields.style.display = "none";
            } else {
                kitchenCodeField.style.display = "none";
                guestFields.style.display = "block";
            }
        }

        window.onload = function() {
            // Initially hide the Kitchen code field
            document.getElementById("kitchenCodeField").style.display = "none";
            // Set event listener to toggle fields when user type changes
            document.forms["frmRegister"]["type_user"].addEventListener("change", toggleFields);
        };
    </script>
</head>
<body>
<div class="login-container">
    <form name="frmRegister" action="/controllers/insertar_cuenta.php" method="post" onsubmit="return validateForm()">
        <div class="divimage">
            <img src="images/Logo2.png" alt="Logo GoldenBites" class="logo">
        </div>
        <h1>Register account</h1> 
        <hr>   
        <label>User type</label>
        <select name="type_user">
            <option value="Guest">Guest</option>
            <option value="Kitchen">Kitchen</option>
        </select>   

         <div id="kitchenCodeField">
        <label>Kitchen code</label>
        <input type="text" name="kitchen_code" placeholder="Enter the kitchen code">
        </div>
        
         <div id="guestFields">
        

        <label>Room number</label>
        <input type="text" name="room_number" placeholder="Enter your room number">
        </div>

        <label>Name</label>
        <input type="text" name="name_usuario" placeholder="Enter your name">


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

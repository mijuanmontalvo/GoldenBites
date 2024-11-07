<!-- header -->
<?php require('partials/head.php') ?> 
<!-- navigation -->
<?php require('partials/nav.php') ?> 
<!-- Banner -->
<?php require('partials/banner.php') ?> 

<section class="trips" id="trip">

<?php
$servername = "localhost";
$username = "food_reservation";
$password = "1234";
$dbname = "goldenbites";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT ID, Name FROM dish";
$result = $conn->query($sql);
?>

<h2>Enter your reservation detailsss</h2>
<br>
        <hr>
        <br>

<form action="/insertar_reservation" method="post" onsubmit="return validateForm()">
    <label for="plato">Name of dish:</label>
    <select id="name_dish" name="name_dish">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["ID"] . '">' . $row["Name"] . '</option>';
            }
        }
        ?>
    </select><br><br>

    <label for="fecha">Reservation Date and Time:</label>
    <input type="datetime-local" id="reservation_date" name="reservation_date" required><br><br>

    <label for="cantidad">Number of dishes:</label>
    <input type="number" id="number_dishes" name="number_dishes" min="1" value="1" required><br><br>

    <label for="observacion">Observation:</label>
    <textarea id="observation" name="observation" rows="4" cols="50" maxlength="100"></textarea><br><br>

    <input type="submit" value="Reserve">
    <a id="btn-form"  href="/reservation"><< Back</a>
</form>

</section>

<!-- Footer -->
<?php require('partials/footer.php') ?> 

<script>
// Function to validate form
function validateForm() {
    // Get fields vsalues
    const reservationDate = document.getElementById('reservation_date').value;
    const numberDishes = document.getElementById('number_dishes').value;
    const observation = document.getElementById('observation').value;

    // Validate date field (not empty)
    if (!reservationDate) {
        alert("The 'Reservation Date and Time' field is required.");
        return false;
    }

    // Validate number of plates (must be a positive numerical value)
    if (isNaN(numberDishes) || numberDishes <= 0 || !Number.isInteger(Number(numberDishes))) {
        alert("The 'Number of dishes' field must be a positive integer.");
        return false;
    }

    // Validate length of observation field (maximum 100 characters)
    if (observation.length > 100) {
        alert("The 'Observation' field cannot exceed 100 characters.");
        return false;
    }

    // If all validations pass, the form is allowed to be submitted.
    return true;
}
</script>



<style>

form {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    font-family: Arial, sans-serif;
    border: 1px solid #ccc;
}

/* Styles for labels and inputs */
form label {
    font-weight: bold;
    color: #333;
    display: block;
    margin-bottom: 2px;
}

form input[type="text"],
form input[type="number"],
form input[type="datetime-local"],
form select,
form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s;
}

form input[type="text"]:focus,
form input[type="number"]:focus,
form input[type="datetime-local"]:focus,
form select:focus,
form textarea:focus {
    border-color: #007bff;
    outline: none;
}

/* Submit button */
form input[type="submit"],
form a {
    display: inline-block;
    width: 48%;
    padding: 10px;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    color: white;
    background-color: #223054;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

/*#btn-form {
    float: left;
    margin-left: 10px;
    padding: .5rem;
    text-decoration: none;
    color: #fff;

}*/

form input[type="submit"]:hover,
form a:hover {
    background-color: #0056b3;
}

/* Back button */
form a {
    background-color: #6c757d;
}

form a:hover {
    background-color: #5a6268;
}

/* Mobile responsiveness */
@media (max-width: 768px) {
    form {
        padding: 15px;
    }

    form input[type="submit"],
    form a {
        width: 100%;
        margin-top: 10px;
    }
}
</style>
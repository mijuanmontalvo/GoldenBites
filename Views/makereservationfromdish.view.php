 <!-- header -->
<?php require('partials/head.php')?> 
  <!-- navigation -->
<?php require('partials/nav.php')?> 
  <!-- Baner -->
<?php require('partials/banner.php')?> 
<section class="trips" id="trips">


<?php


// Connection to the database
include 'db_connect.php';

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// See all dishes
$sql = "SELECT ID, Name, image FROM dish WHERE ID = $ID";
$result = $conn->query($sql);

$firstImage = ''; // Variable to store the image of the first selected dish

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $firstImage = base64_encode($row['image']); // Get the image of the first dish
}
?>

<hr>
<br> 
<h2>Enter your reservation details</h2>
<br>
<hr>
<br>

<div class="edit-container">
    <form action="/insertar_reservation" method="post" onsubmit="return validateForm()">
        <label for="plato">Name of dish:</label>
        <select id="name_dish" name="name_dish" onchange="updateDishImage()">
            <?php
            // Generate the select options
            if ($result->num_rows > 0) {
                echo '<option value="' . $row["ID"] . '" data-image="data:image/jpeg;base64,' . base64_encode($row["image"]) . '">' . $row['Name'] . '</option>';
                while ($row = $result->fetch_assoc()) {
                    echo '<option value="' . $row["ID"] . '" data-image="data:image/jpeg;base64,' . base64_encode($row["image"]) . '">' . $row["Name"] . '</option>';
                }
            }
            ?>
        </select><br><br>

        <label for="fecha">Reservation Date and Time:</label>
        <input type="datetime-local" id="reservation_date" name="reservation_date"><br><br>

        <label for="cantidad">Number of dishes:</label>
        <input type="number" id="number_dishes" name="number_dishes" min="1" value="1" required><br><br>

        <label for="observacion">Observation:</label>
        <textarea id="observation" name="observation" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Reserve">
        <a id="btn-form" href="/ourdishes"><< Back</a>
    </form>

    <!-- Dish image container -->
    <div id="dish-image-container">
        <img id="dish-image" src="data:image/jpeg;base64,<?php echo $firstImage; ?>" alt="Dish Image">
    </div>
</div>

</section>

<!-- Footer -->
<?php require('partials/footer.php')?>

<script>
// Function to update the image of the dish
function updateDishImage() {
    const select = document.getElementById("name_dish");
    const selectedOption = select.options[select.selectedIndex];
    const imageSrc = selectedOption.getAttribute("data-image");
    document.getElementById("dish-image").src = imageSrc;
}

// Form validation
function validateForm() {
    const reservationDate = document.getElementById('reservation_date').value;
    const numberDishes = document.getElementById('number_dishes').value;
    const observation = document.getElementById('observation').value;

    if (!reservationDate) {
        alert("The 'Reservation Date and Time' field is required.");
        return false;
    }
    if (isNaN(numberDishes) || numberDishes <= 0 || !Number.isInteger(Number(numberDishes))) {
        alert("The 'Number of dishes' field must be a positive integer.");
        return false;
    }
    if (observation.length > 100) {
        alert("The 'Observation' field cannot exceed 100 characters.");
        return false;
    }

    return true;
}
</script>

<style>
/* General styles for the form */
form {
    max-width: 500px;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    font-family: Arial, sans-serif;
    border: 1px solid #ccc;
    
}

/* Styles for labels and inputs*/
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

form input[type="submit"]:hover,
form a:hover {
    background-color: #0056b3;
}

form a {
    background-color: #6c757d;
}

form a:hover {
    background-color: #5a6268;
}

/* Dish image container */
#dish-image-container {
    max-width: 500px;
    max-height: 500px;
    padding: 10px;
    background-color: #f9f9f9;
    border-radius: 8px;
    border: 1px solid #ccc;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

#dish-image {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
}

/* Responsive design */
.edit-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    align-items: flex-start;
}

@media (max-width: 768px) {
    .edit-container {
        flex-direction: column-reverse;
    }

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

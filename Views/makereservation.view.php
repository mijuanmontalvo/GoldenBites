<!-- header -->
<?php require('partials/head.php') ?> 
<!-- navigation -->
<?php require('partials/nav.php') ?> 
<!-- Banner -->
<?php require('partials/banner.php') ?> 

<?php
$servername = "localhost";
$username = "food_reservation";
$password = "1234";
$dbname = "goldenbites";

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los platos y sus imágenes en base64
$sql = "SELECT ID, Name, image FROM dish";
$result = $conn->query($sql);

// Convertir los resultados a un array para usarlos en JavaScript
$dishes = [];
while ($row = $result->fetch_assoc()) {
    $dishes[] = [
        'ID' => $row['ID'],
        'Name' => $row['Name'],
        'Image' => base64_encode($row['image'])
    ];
}
?>

<section class="trips" id="trip">
    <hr><br>
    <h2>Enter your reservation details</h2><br>
    <hr><br>

    <!-- Formulario -->
    <div class="reservation-form-container">
        <form action="/insertar_reservation" method="post" onsubmit="return validateForm()">
            <label for="plato">Name of dish:</label>
            <select id="name_dish" name="name_dish" onchange="updateDishImage()">
                <?php foreach ($dishes as $dish): ?>
                    <option value="<?php echo $dish['ID']; ?>"><?php echo $dish['Name']; ?></option>
                <?php endforeach; ?>
            </select><br><br>

            <label for="fecha">Reservation Date and Time:</label>
            <input type="datetime-local" id="reservation_date" name="reservation_date" required><br><br>

            <label for="cantidad">Number of dishes:</label>
            <input type="number" id="number_dishes" name="number_dishes" min="1" value="1" required><br><br>

            <label for="observacion">Observation:</label>
            <textarea id="observation" name="observation" rows="4" cols="50" maxlength="100"></textarea><br><br>

            <input type="submit" value="Reserve">
            <a id="btn-form" href="/reservation"><< Back</a>
        </form>

        <!-- Imagen del plato -->
        <div class="dish-image-container">
            <img id="dishImage" src="data:image/jpeg;base64,<?php echo $dishes[0]['Image']; ?>" alt="Dish Image">
        </div>
    </div>
</section>

<!-- Footer -->
<?php require('partials/footer.php') ?>

<script>
// Array de platos y sus imágenes en base64
const dishes = <?php echo json_encode($dishes); ?>;

// Función para actualizar la imagen según el plato seleccionado
function updateDishImage() {
    const selectElement = document.getElementById("name_dish");
    const selectedDishID = selectElement.value;
    const dishImageElement = document.getElementById("dishImage");

    // Encontrar el plato seleccionado y actualizar la imagen
    const selectedDish = dishes.find(dish => dish.ID == selectedDishID);
    if (selectedDish) {
        dishImageElement.src = "data:image/jpeg;base64," + selectedDish.Image;
    }
}

// Validación del formulario
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
/* General Styles */
.reservation-form-container {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    gap: 20px;
}

/* Form Styles */
form {
    max-width: 500px;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    font-family: Arial, sans-serif;
    border: 1px solid #ccc;
}

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

/* Dish Image Styles */
.dish-image-container {
    max-width: 500px;
    max-height: 500px;
    padding: 10px;
    background-color: #f9f9f9;
    border-radius: 8px;
    border: 1px solid #ccc;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.dish-image-container img {
    width: 100%;
    height: auto;
    border-radius: 5px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .reservation-form-container {
        flex-direction: column-reverse;
    }

    form, .dish-image-container {
        max-width: 100%;
        margin-bottom: 20px;
    }
}
</style>

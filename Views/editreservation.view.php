  <!-- header-->
  <?php require('partials/head.php')?> 
  <!-- navigation -->
<?php require('partials/nav.php')?> 
  <!-- Baner -->
<?php require('partials/banner.php') ?> 

<?php 
include 'db_connect.php';


//Query to select reservation ID to be edited
//$ID = $_GET['ID'];
$sql = "SELECT ID, UserID, DishID, DateReservation, NumberDish, Observation, Estate 
        FROM reservation WHERE ID = $ID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $UserID = $row['UserID'];
    $DishID = $row['DishID'];
    $DateReservation = $row['DateReservation'];
    $NumberDish = $row['NumberDish'];
    $Observation = $row['Observation'];
    $Estate = $row['Estate'];
} else {
    echo "0 resultados";
}

$sql3 = "SELECT ID, Name, image FROM dish";
$result3 = $conn->query($sql3);

$conn->close();
?>

<section class="trips" id="trip">
<hr>
<br>
<h2>Edit the data of the reservation</h2>
<br>
<hr>
<br>

<div class="edit-container">
    <form action="/inserteditreservation" method="post" onsubmit="return validateForm()">
        <input type="hidden" name="ID" value="<?php echo $ID; ?>">
        <input type="hidden" name="UserID" value="<?php echo $UserID; ?>">

        <label for="plato">Name of dish:</label>
        <select id="name_dish" name="name_dish" onchange="updateDishImage()">
            <?php
            if ($result3->num_rows > 0) {
                $firstImage = '';
                while ($row3 = $result3->fetch_assoc()) {
                    $selected = $row3["ID"] == $DishID ? 'selected' : '';
                    echo '<option value="' . $row3["ID"] . '" data-image="data:image/jpeg;base64,' . base64_encode($row3["image"]) . '" ' . $selected . '>' . $row3["Name"] . '</option>';
                    if ($selected) {
                        $firstImage = base64_encode($row3["image"]);
                    }
                }
            }
            ?>
        </select><br><br>

        <label for="fecha">Reservation Date and Time:</label>
        <input type="datetime-local" id="reservation_date" name="reservation_date" value="<?php echo $DateReservation; ?>"><br><br>

        <label for="cantidad">Number of dishes:</label>
        <input type="number" id="number_dishes" name="number_dishes" min="1" value="<?php echo $NumberDish; ?>" required><br><br>

        <label for="observacion">Observation:</label>
        <textarea id="observation" name="observation" rows="4" cols="50"><?php echo $Observation; ?></textarea><br><br>

        <input type="submit" value="Edit">
        <a id="btn-for" href="/reservation"><< Back</a>
    </form>

    <!-- Container for dish image -->
    <div id="dish-image-container">
        <img id="dish-image" src="data:image/jpeg;base64,<?php echo $firstImage; ?>" alt="Dish Image">
    </div>
</div>

</section>

<?php require('partials/footer.php'); ?>

<script>
// Function to update dish image based on selection
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


        // Show confirmation message
   const confirmMessage = "Do you want to confirm the edition of this reservation?";
   /* const confirmMessage = "Reservation Summary:\n\n" +
        "Dish: ${selectedDishName}\n" +
        "Date and Time: ${reservationDate}\n" +
        "Number of Dishes: ${numberDishes}\n" +
        "Observation: ${observation || 'None'}\n\n" +
        "Do you want to confirm this reservation?";*/


    if (!confirm(confirmMessage)) {
        // Cancel submission if user does not confirm
        return false;
    }

    return true;
}
</script>

<style>
/* Styling for the form */
.edit-container {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    gap: 20px;
}

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

/* Dish image container styling */
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

/* Layout for form and image container */
.edit-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    align-items: flex-start;
}

/* Responsive styles for mobile view */
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


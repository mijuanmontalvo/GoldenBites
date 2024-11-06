<!-- header / hero -->
<?php require('partials/head.php')?> 
  <!-- navigation -->
<?php require('partials/nav.php')?> 
  <!-- Banner -->
<?php require('partials/banner.php')?> 
<section class="trips" id="trip" >
        <h2>
        Enter the data of the new plate
            
        </h2>
        <br>
        <hr>
        <br>
        <form action="/insertnewdish" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <label for="dishname">Dish Name:</label>
        <input type="text" name="name">
        <br>
        <label for="description">Description:</label>
        <textarea name="description" rows="4" cols="50"></textarea>
        <br>
        <label for="price">Price:</label>
        <input type="text" name="price">
        <br>
        <label for="price">Dish image:</label>
        <input type="file" name="image_dish">
        <br><br>
        <input type="submit" value="Add dish">
        <a id="btn-form"  href="/ourdishes"><< Back</a>
        </form>

  </section>
  <!-- Footer -->
  <?php require('partials/footer.php')?>
 
 <script>

function validateForm() {
    // Get the field values
    const name = document.forms[0]["name"].value;
    const description = document.forms[0]["description"].value;
    const price = document.forms[0]["price"].value;
    const imageDish = document.forms[0]["image_dish"].value;

    // Validate that the 'Dish Name' field is not empty
    if (name.trim() === "") {
        alert("The 'Dish Name' field cannot be empty.");
        return false;
    }

    // Validar que el campo 'Description' no esté vacío y no supere los 100 caracteres
    if (description.trim() === "") {
        alert("The 'Description' field cannot be empty.");
        return false;
    } else if (description.length > 100) {
        alert("The 'Description' field cannot exceed 100 characters.");
        return false;
    }

    // Validate that the 'Price' field is not empty and only contains whole numbers or decimals
    if (price.trim() === "") {
        alert("The 'Price' field cannot be empty.");
        return false;
    } else if (!/^\d+(\.\d{1,2})?$/.test(price)) {
        alert("The 'Price' field must be an integer or decimal (maximum two decimals).");
        return false;
    }

    // Validate that the 'Dish image' field is not empty and is of image type
    if (imageDish === "") {
        alert("You must select an image for 'Dish image'.");
        return false;
    } else {
        const allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        if (!allowedExtensions.exec(imageDish)) {
            alert("Only image files with .jpg, .jpeg, .png or .gif extensions are allowed.");
            return false;
        }
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


form input[type="file"] {
    padding: 10px;
    font-size: 16px;
    color: #333;
    background-color: #f1f1f1;
    border: 1px solid #ccc;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    width: 100%;
}

form input[type="file"]:hover {
    background-color: #e2e6ea;
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



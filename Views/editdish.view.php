  <!-- header --> 
<?php require('partials/head.php')?> 

  <!-- navigation -->
<?php require('partials/nav.php')?> 


<?php 
include 'db_connect.php';

$sql = "SELECT ID, name, description, price, image FROM dish where ID=$ID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$name=$row['name'];
$description=$row['description'];
$price=$row['price'];
$image=$row['image'];
$image=base64_encode($image);
} else {
    echo "0 resultados";
  }
  $conn->close();
?> 

<section class="gallery" >
        <h2>
        Edit the data of the plate:
            
        </h2>
        <hr>
        <form action="/inserteditdish" method="post" enctype="multipart/form-data">
        
        <input type="hidden" name="ID" value="<?php echo $ID;?>">
        <br>
        Dish Name:<br>
        <input type="text" name="name" value="<?php echo $name;?>">
        <br>
        Description:<br>
        <textarea name="description" rows="4" cols="50" ><?php echo $description;?></textarea>
        <br><br>
        Price:<br>
        <input type="text" name="price" value="<?php echo $price;?>">
        <br><br>
        New dish image:<br>
        <input type="file" name="image_dish">
        <br><br>
        <input type="submit" value="Edit dish">
        </form>

  </section>

  <!-- Footer -->
<?php require('partials/footer.php')?>
  <!-- header -->
<?php require('partials/head.php')?> 
  <!-- navigation -->
<?php require('partials/nav.php')?> 
  <!-- Banner -->
<?php require('partials/banner.php') ?> 

<?php 
include 'db_connect.php';


$sql = "DELETE FROM dish where ID=$ID";
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



  <!-- Footer -->
<?php require('partials/footer.php')?>
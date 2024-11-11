<?php require('partials/head.php')?> 
  <!-- navigation -->
<?php require('partials/nav.php')?> 
  <!-- Banner -->
<?php require('partials/banner.php') ?> 

<?php 
include 'db_connect.php';

//query to delete dish in database
$sql = "DELETE FROM reservation WHERE ID=$ID";
$conn->query($sql);
header("Location: /reservation");
$conn->close();



?> 

  <!-- Footer -->
<?php require('partials/footer.php')?>
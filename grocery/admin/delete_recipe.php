<?php
include('connect.php');

$get_id=$_GET['id'];

mysqli_query($conn, "delete from Recipe where recipeID='$get_id'")or die(mysqli_error());
header('location:AdRecipe.php');
?>

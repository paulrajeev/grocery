<?php
include('connect.php');

$get_id=$_GET['id'];

mysqli_query($conn, "delete from tb_deal where productID='$get_id'")or die(mysqli_error());
header('location:deal.php');
?>

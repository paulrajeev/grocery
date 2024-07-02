<?php
include('connect.php');


$get_id=$_GET['id'];

mysqli_query($conn,"update order_details set status='Delivered', modeofpayment='Paypal' where orderid='$get_id'")or die(mysql_error());

header('location:orders.php');

?>
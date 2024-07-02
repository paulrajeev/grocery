<?php 
include('admin/connect.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
	$paid = mysqli_query($conn,"UPDATE order_details set status = 'paid', modeofpayment='Online' ");
	if($paid){
		header("Location:user_All_Products.php");
	}
}
?>
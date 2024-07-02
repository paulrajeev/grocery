<?php include('session.php'); ?>
<?php include('header.php'); ?>

<?php include('admin/connect.php'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<body>
    <?php
    include('navtop2.php');
    ?>
    <div id="background">
        

        <div id="page">
          
            <div id="content">
                <div class="hero-unit-table"> 
                    <div id="header">
                    
                    </div>
                    <div id="body">



                        <h3>List of Our Products</h3>
                        <p>
                        
						<?php include ('navbar_menu.php');?>
						

                        </p>
                        <h3>Fruits</h3>
                        <ul class="thumbnails">
                            <?php
                            $query = mysqli_query($conn, "select * from tb_products WHERE category = 'Women'") or die(mysqli_error());
                            while ($row = mysqli_fetch_array($query)) {
                                $id = $row['productID'];
								$qty = $row['quantity'];
								
									$query1 = mysqli_query($conn, "SELECT *,SUM(qty) as qty FROM order_details WHERE productID = '$id' AND status = 'Delivered'");
									$row1 = mysqli_fetch_array($query1);
									$total_qty = $qty - $row1['qty'];									
                                ?>

                                <li class="span3">
                                    <div class="thumbnail">
                                        <img data-src="holder.js/300x200" alt="">
                                        <div class="alert alert-success"><div class="font1"><?php echo $row['name']; ?></div></div>
                                        <hr>


                                        <a  href="#<?php echo $id; ?>"   data-toggle="modal"><img src="admin/<?php echo $row['location'] ?>" class="img-rounded" alt="" width="160" height="200"></a>


                                        <p>
                                            <a> Price: <?php echo $row['price']; ?></a>
                                        </p>
                                        
                                     										<?php if($total_qty > 0){ ?>
                                        <a href="#add<?php echo $id; ?>"   data-toggle="modal" class="btn btn-success"><i class="icon-shopping-cart icon-large"></i>&nbsp;Add to Cart</a>
										<?php }else{ ?>
										<span class="label label-important">Out of Stock</span>
										<?php } ?>
                                        <?php include('order_modal.php'); ?>
                                    <?php } ?>
                                    <?php
                                    if (isset($_POST['order'])) {
                                        $member_id = $_POST['member_id'];
                                        $quantity = $_POST['quantity'];
                                        $price = $_POST['price'];
                                        $product_id = $_POST['product_id'];
                                        $total = $quantity * $price;
                                        mysqli_query($conn, "insert into order_details (memberID,qty,productID,price,total,status) values('$member_id','$quantity','$product_id','$price','$total','Pending')") or die(mysqli_query);
                                     /*    header('location:user_wines.php'); */
										?>
												<script>
																window.location = 'user_Women.php';				
																</script>
										<?php
                                    }
                                    ?>
                        </ul>

                    </div>
                    <div id="footer">
                        <?php include('footer.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php include('footer_bottom.php'); ?>
</body>



</html>
<?php include('session.php'); ?>

<?php
include('admin/connect.php');?>
<?php include('header.php');
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
 body , html
  {
    background-color: black;
  }
  .thumbnails {
    margin-left: -20px;
    list-style: none;
    position: relative;
    display: flex;
    flex-wrap: wrap;
    gap: 58px;}
</style>
<body>
    <?php
    include('navtop2.php');
    ?>
    
          
        <div id="page">

      

            <div id="content">
                <div class="hero-unit-table">                        <!-- image slider -->
                <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Z3JvY2VyeXxlbnwwfHwwfHx8MA%3D%3D" class="d-block w-100" style = "height: 65vh !important;" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Fresh Picks Delivered</h5>
        <p>Farm-to-Table Goodness at Your Doorstepe.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Z3JvY2VyeXxlbnwwfHwwfHx8MA%3D%3D" class="d-block w-100" style = "height: 65vh !important;" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Healthy & Delicious</h5>
        <p>Nutrient-Rich Options for Your Well-being.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://images.unsplash.com/photo-1542838132-92c53300491e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Z3JvY2VyeXxlbnwwfHwwfHx8MA%3D%3D" class="d-block w-100" style = "height: 65vh !important;" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Eco-Friendly Packaging</h5>
        <p>Commitment to Sustainability with Every Order.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
                    <!-- end slider -->
<hr/>
<center><h3 class = "center alert alert-success" style = "width:500px; font-weight:Bolder;">Deal of the day</h3></center>  



<ul class="thumbnails">
                            <?php
                            $query = mysqli_query($conn, "select * from tb_deal WHERE category = 'Grocery'") or die(mysqli_error());
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
                                        <?php include('order_modal2.php'); ?>
                                    <?php } ?>
                                    <?php
                                    if (isset($_POST['order'])) {
                                        $member_id = $_POST['member_id'];
                                        $quantity = $_POST['quantity'];
                                        $price = $_POST['price'];
                                        $product_id = $_POST['product_id'];
                                        $total = $quantity * $price;
                                        mysqli_query($conn, "insert into order_details (memberID,qty,productID,price,total,status) values('$member_id','$quantity','$product_id','$price','$total','Pending')") or die(mysqli_query);
                                     
										?>
												<script>
																window.location = 'user_index.php';				
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

</html>
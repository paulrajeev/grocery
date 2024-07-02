<?php
include('header.php');
?>
<?php include('admin/connect.php'); ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
    * {
     margin : 0px;
     padding : 0px;
  }
    #content #body > ul {
    margin: 40px;
    overflow: hidden;
    padding: 5px 5px 8px 0px;
    position: relative;
    display: flex;
    flex-wrap: wrap;
    gap: 75px;
    list-style-type: none;
    }
</style>

<body>
    <?php
    include('navtop.php');
    ?>

    <div id="background">

        <div id="page">


            <div id="content">
                <div class="hero-unit-table">  
                    <div id="carouselExampleCaptions" class="carousel slide" >
                        <div class="carousel-indicators" >
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://images.unsplash.com/photo-1506617564039-2f3b650b7010?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" style="height: 65vh !important;" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Fresh Picks Delivered</h5>
                                    <p>Farm-to-Table Goodness at Your Doorstepe.</p>
                                </div>
                            </div>
                            <!-- Add more carousel items here -->
                        </div>
                        <!-- Add carousel controls here -->
                    </div>
                    <hr/>
                    <center><h3 class="center alert alert-success" style="width:500px; font-weight:Bolder;">Deal of the day</h3></center>
                    <div id="body">
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
                                        <a href="#<?php echo $id; ?>" data-toggle="modal"><img src="admin/<?php echo $row['location'] ?>" class="img-rounded" alt="" width="160" height="200"></a>
                                        <p>
                                            <a> Price: <?php echo $row['price']; ?></a>
                                        </p>
                                        <a href="order.php" class="btn btn-success" onclick="alert('Please login to order');">
                                            <i class="icon-shopping-cart icon-large"></i>&nbsp; Login to Order
                                        </a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>  
                    <div id="footer">
                        <?php include('footer.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

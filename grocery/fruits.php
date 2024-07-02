<?php include('header.php'); ?>
<?php include('admin/connect.php'); ?>
<style>
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
                    <div id="header">
                        

                    </div>
                    <div id="body">


                        <h3>List of Our Products</h3>
                        <p>
                        <?php include ('product_menu.php');?>
                        </p>
                               <h2>Fruits</h2>
                        <ul class="thumbnails">
                            <?php
                            $query = mysqli_query($conn, "select * from tb_products WHERE category = 'Women'") or die(mysqli_error());
                            while ($row = mysqli_fetch_array($query)) {
                                $id = $row['productID'];
                                ?>

                                <li class="span3">
                                    <div class="thumbnail">
                                        <img data-src="holder.js/300x200" alt="">
                                        <div class="alert alert-info"><div class="font1"><?php echo $row['name']; ?></div></div>
                                        <hr>


                                        <a  href="#<?php echo $id; ?>"   data-toggle="modal"><img src="admin/<?php echo $row['location'] ?>" class="img-rounded" alt="" width="160" height="200"></a>


                                        <p>
                                            <p> Price: <?php echo $row['price']; ?></p>
                                        </p>

                                        <a href="order.php" class="btn btn-success" onclick="return loginToOrder()">
        <i class="icon-shopping-cart icon-large"></i>&nbsp; Login to Order
    </a>

    <script>
        function loginToOrder() {
            return confirm('Please login to order. Do you want to proceed?');
        }
    </script>


                                    </div>
                                </li>

                                <!-- picture modal -->
                                <div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                    </div>
                                    <div class="modal-body">

                                        <div class="span2">

                                            <img src="admin/<?php echo $row['location']; ?>" width="200" height="200" class="img-rounded">      
                                        </div>
                                        <div class="span3">
											<p>Name</p>
                                            <div class="alert alert-success">&nbsp;&nbsp;<?php echo $row['name'] ?></div>
											<p>Description</p>
                                            <div class="alert alert-success">&nbsp;&nbsp;<?php echo $row['description'] ?></div>
											
                                            <div class="alert alert-success">&nbsp;&nbsp;&nbsp;&nbsp;Made in: <?php echo $row['originated'] ?> </div>
											<p>Price</p>
                                            <div class="alert alert-success">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['price'] ?></div>
                                            
                                        </div>





                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i>&nbsp;Close</button>
                                    </div>
                                </div>
                                <!-- end modal -->


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
    <?php
    include('footer_bottom.php');
    ?>
</body>



</html>
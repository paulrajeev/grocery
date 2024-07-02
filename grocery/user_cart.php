<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include 'admin/connect.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<body>
    <?php include('navtop2.php'); ?>
    <div id="background">
        <div id="page">
            <div id="content">
                <div class="hero-unit-table">
                    <div id="header"></div>
                    <div id="body">
                        <h3>Cart</h3>
                        <div class="hero-unit-table">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cart_table = mysqli_query($conn, "SELECT * FROM order_details WHERE memberID='$ses_id' AND status='Pending'") or die(mysqli_error($conn));
                                    $cart_count = mysqli_num_rows($cart_table);
                                    while ($cart_row = mysqli_fetch_array($cart_table)) {
                                        $order_id = $cart_row['orderid'];
                                        $product_id = $cart_row['productID'];
                                        $product_query = mysqli_query($conn, "SELECT * FROM tb_products WHERE productID='$product_id'") or die(mysqli_error($conn));
                                        $product_row = mysqli_fetch_array($product_query);

                                        if ($product_row) {
                                    ?>
                                            <tr>
                                                <td><?php echo $product_row['name']; ?></td>
                                                <td><?php echo $cart_row['price']; ?></td>
                                                <td><?php echo $cart_row['qty']; ?></td>
                                                <td><?php echo $cart_row['total']; ?></td>
                                                <td width="100"><a href="#orderdel<?php echo $order_id; ?>" role="button" data-toggle="modal" class="btn btn-danger"><i class="icon-remove icon-large"></i>&nbsp;Remove</a></td>
                                            </tr>
                                            <!-- product delete modal -->
                                            <div id="orderdel<?php echo $order_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-header"></div>
                                                <div class="modal-body">
                                                    <div class="alert alert-danger">Are you Sure you Want to <strong>Remove &nbsp;</strong>this item?</div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-danger" href="remove_item.php<?php echo '?id=' . $order_id; ?>"><i class="icon-check icon-large"></i>&nbsp;Yes</a>
                                                    <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;No</button>
                                                </div>
                                            </div>
                                            <!-- end delete modal -->
                                        <?php 
                                        } 
                                    } 
                                        ?>
                                </tbody>
                            </table>
                        </div>

                        <?php
                        if ($cart_count != 0) {
                            $result = mysqli_query($conn, "SELECT sum(total) FROM order_details WHERE memberID='$ses_id' AND status = 'Pending'") or die(mysqli_error($conn));
                            while ($rows = mysqli_fetch_array($result)) {
                        ?>
                                <center><a href="#order" role="button" data-toggle="modal" class="btn btn-success"><i class="icon-truck icon-large"></i>&nbsp;Order Items?</a></center>
                                <div class="pull-right">
                                    <div class="span"><div class="alert alert-success"><i class="icon-credit-card icon-large"></i>&nbsp;Total:&nbsp;<?php echo $rows['sum(total)']; ?></div></div>
                                </div>
                            <?php 
                            }
                        }
                        ?>

                        <!-- product order modal -->
                        <div id="order" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header"></div>
                            <div class="modal-body">
                                <div class="alert alert-info">Payment</div>
                                <div class="alert alert-danger">By Clicking Yes Icon You Agree to &nbsp;<strong>Confirm the Order &nbsp;</strong>and You will be contacted for payment terms</div>
                                <a class="btn btn-success" href="pay.php<?php echo '?id=' . $ses_id; ?>" onclick="alert('order confirmed! Proceed to Pay');">Yes</a>
                            </div>
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i>&nbsp;No</button>
                            </div>
                        </div>
                        <!-- end delete modal -->
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

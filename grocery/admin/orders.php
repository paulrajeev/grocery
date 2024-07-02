<?php include('session.php'); ?>	
<?php include('header.php'); ?>	
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">&nbsp;</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown"> 
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        Welcome : Administrator
                    </a>
                </li>
            </ul>
        </nav>
        <?php include('nav_sidebar.php'); ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="hero-unit-table">   
                            <table class="table table-striped table-bordered table-hover table-condensed" id="dataTables-example">
                                <div class="alert alert-info">
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Order Table</strong>
                                </div>
                                <ul class="breadcrumb"> 
                                    <li>Orders<span class="divider">/</span></li>				
                                    <li class="active">Pending Orders<span class="divider">/</span></li>
                                    <li><a href="delivered.php">Delivered</a> <span class="divider">/</span></li>
                                </ul>
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Customer Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Mode of Payment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include('connect.php');
                                    $cart_table = mysqli_query($conn, "SELECT * FROM order_details WHERE (status='Pending' OR status='Paid')") or die(mysqli_error($conn));
                                    $cart_count = mysqli_num_rows($cart_table);
                                    while ($cart_row = mysqli_fetch_array($cart_table)) {
                                        $order_id = $cart_row['orderid'];
                                        $product_id = $cart_row['productID'];
                                        $member_id = $cart_row['memberID'];

                                        $product_query = mysqli_query($conn, "SELECT * FROM tb_products WHERE productID='$product_id'") or die(mysqli_error($conn));
                                        $product_row = mysqli_fetch_array($product_query);
                                        if (!$product_row) {
                                            // Skip this iteration if the product is not found
                                            continue;
                                        }

                                        $member_query = mysqli_query($conn, "SELECT * FROM tb_member WHERE memberID='$member_id'") or die(mysqli_error($conn));
                                        $member_row = mysqli_fetch_array($member_query);
                                        if (!$member_row) {
                                            // Skip this iteration if the member is not found
                                            continue;
                                        }
                                    ?>
                                        <tr>
                                            <td><?php echo $product_row['name']; ?></td>
                                            <td><?php echo $member_row['Firstname'] . " " . $member_row['Lastname']; ?></td>
                                            <td><?php echo $cart_row['price']; ?></td>
                                            <td><?php echo $cart_row['qty']; ?></td>
                                            <td><?php echo $cart_row['total']; ?></td>
                                            <td><?php echo $cart_row['status']; ?></td>
                                            <td><?php echo $cart_row['modeofpayment']; ?></td>
                                            <td width="140">
                                                <a href="update_status.php<?php echo '?id=' . $order_id; ?>" class="btn btn-success">
                                                    <i class="fa fa-check"></i>&nbsp;Confirm Order
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <?php include('script.php'); ?>
</body>
</html>

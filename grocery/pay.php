<?php
include('admin/connect.php');
include('session.php');
$get_id=$_GET['id'];

			
						function createRandomPassword() {
					$chars = "abcdefghijkmnopqrstuvwxyz023456789";
					srand((double)microtime()*1000000);
					$i = 0;
					$pass = '' ;
					while ($i <= 7) {
						$num = rand() % 33;
						$tmp = substr($chars, $num, 1);
						$pass = $pass . $tmp;
						$i++;
					}
					return $pass;
				}
				$confirmation = createRandomPassword();
						

/* mysql_query("update order_details set status='Pending',transaction_code='$confirmation',modeofpayment='Online' where MemberID='$get_id'")or die(mysql_error());
 */


?>

<?php include('header.php'); ?>
 
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
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
                        <h3>Payment and Delivery of Items</h3>
						<h3>Kindly Wait for the Call back or you may call now </h3>
						<a href="tel:+919439364623"></a>
						<h4>Call  <a href="tel:+918210611264"  </a>   +91-8210611264
						    <a href="tel:+917205827877"  </a> +91-7205827877 </h4>   
							
							<a href="https://api.whatsapp.com/send?phone=917205827877"></a>
						<h4> <a href="https://api.whatsapp.com/send?phone=917205827877"  </a> Click here To contact us on whatsapp </h4>
						
						<!--<span style="color: #008000;"<strong><span style="font-size: 12pt;">click here</span></span></strong></span></p>
						
						<p><span style="color: #008000;"><strong><span style="font-size: 12pt;">To contact us on whatsapp <a href="https://api.whatsapp.com/send?phone=917205827877"> </a>-->
						
						
        </div>
    </div>
							
							
                        <hr>
                        <div class="hero-unit-table">
                       <!-- <span id="paypal-button"></span>-->
                        <?php
                        $total = 0;
                                    $cart_table = mysqli_query($conn, "select  * from order_details where memberID='$ses_id'") or die(mysqli_error());
                                    $cart_count = mysqli_num_rows($cart_table);
                                    while ($cart_row = mysqli_fetch_array($cart_table)) {
                                        $order_id = $cart_row['orderid'];
                                        $product_id = $cart_row['productID'];
                                        $product_query = mysqli_query($conn, "select * from tb_products where productID='$product_id'") or die(mysqli_error());
                                        $product_row = mysqli_fetch_array($product_query);

                                    }
                                    if ($cart_count != 0) {
                                $result = mysqli_query($conn, "SELECT sum(total) FROM order_details WHERE memberID='$ses_id' and status = 'Pending'") or die(mysqli_error());
                                while ($rows = mysqli_fetch_array($result)) {
                        $total = $rows['sum(total)'];
                                 }
                            } 
                                        ?>
					
						<!-- <form action="https://www.sandbox.paypal.com/cgi-bin/webscr"  method="post">
                            <input type="hidden" name="cmd" value="_xclick" />
                            <input type="hidden" name="business" value="moozikaymelos@gmail.com" />
                            <input type="hidden" name="item_name" value="Instruments" />
								
                               <?php
                                    $cart_table = mysqli_query($conn, "select  * from order_details where memberID='$ses_id'") or die(mysqli_error());
                                    $cart_count = mysqli_num_rows($cart_table);
                                    while ($cart_row = mysqli_fetch_array($cart_table)) {
                                        $order_id = $cart_row['orderid'];
                                        $product_id = $cart_row['productID'];
                                        $product_query = mysqli_query($conn, "select * from tb_products where productID='$product_id'") or die(mysqli_error());
                                        $product_row = mysqli_fetch_array($product_query);
                                        ?>
                            
                           <input type="hidden" name="item_number" value="<?php $confirmation; ?>" />

                           <?php } ?>
                           
                            <?php
                            if ($cart_count != 0) {
                                $result = mysqli_query($conn, "SELECT sum(total) FROM order_details WHERE memberID='$ses_id' and status = ''") or die(mysqli_error());
                                while ($rows = mysqli_fetch_array($result)) {
                                    ?>
                                    <input type="hidden" name="amount" value="<?php echo $rows['sum(total)']; ?>" />
                                <?php }
                            } ?>


                            <input type="hidden" name="no_shipping" value="<?php echo 2; ?>" />
                            <input type="hidden" name="no_note" value="2" />
                            <input type="hidden" name="currency_code" value="PHP" />
                            <input type="hidden" name="lc" value="GB" />
                            
                            <input type="image" src="paypal_button.png" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" style="margin-left: 280px;" class="img-rounded" />
                            <img alt="fdff" border="0" src="paypal_button.png" width="1" height="1" />
                            Payment confirmed 
                            <input type="hidden" name="return" value="https://tameraplazainn.x10.mx/savingreservation.php?confirmation<?php echo $confirmation; ?>" />
                            Payment cancelled 
                            <input type="hidden" name="cancel_return" value="http://tameraplazainn.x10.mx/cancel.php" />
                            <input type="hidden" name="rm" value="2" />
                            <input type="hidden" name="notify_url" value="http://tameraplazainn.x10.mx/ipn.php" />
                            <input type="hidden" name="custom" value="any other custom field you want to pass" />
							
					
                        </form> -->
						
					
                           
                    </div>
                    </div>
                    <div id="footer">
<?php include('footer.php'); ?>
<script>
paypal.Button.render({
    env: 'sandbox', // change for production if app is live,
 
        //app's client id's
    client: {
        sandbox:    'AajzLvIrFvyOWy4AZ7jlItP5Sesk7kOod3QMBr9l9qq57Hf2IZmhJPmPrQWko1Sj0aNcmm4Hdi0Wbx8A',
        //production: 'AaBHKJFEej4V6yaArjzSx9cuf-UYesQYKqynQVCdBlKuZKawDDzFyuQdidPOBSGEhWaNQnnvfzuFB9SM'
    },
 
    commit: true, // Show a 'Pay Now' button
 
    style: {
        color: 'gold',
        size: 'small'
    },
 
    payment: function(data, actions) {
        return actions.payment.create({
            payment: {
                transactions: [
                    {
                        //total purchase
                        amount: { 
                            total: '<?php echo $total; ?>', 
                            currency: 'USD' 
                        }
                    }
                ]
            }
        });
    },
 
    onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function(payment) {
            console.log(payment)
            location.replace('paid.php?id=<?php echo $_GET['id'] ?>')           
        });
    },
 
}, '#paypal-button');
</script>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer_bottom.php'); ?>
</body>
</html>



						
                               
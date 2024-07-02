<?php include ('session.php');?>	
<?php
ob_start();
include('header.php');
$get_id = $_GET['id'];
if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $originated = $_POST['originated'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $location='';
    if(!empty($_FILES['image']['tmp_name'])){
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name = addslashes($_FILES['image']['name']);
        $image_size = getimagesize($_FILES['image']['tmp_name']);
    //
        move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
        $location = "upload/" . $_FILES["image"]["name"];
    }
    $loc = !empty($location) ? ", location = '$location' ": '';
    mysqli_query($conn, "update tb_products set name='$name',description='$description',category='$category',originated='$originated',price='$price',quantity='$quantity' $loc where productID='$get_id'") or die(mysqli_query());
    header('location:product.php');
}
?>
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
                <a class="navbar-brand" href="index.html"></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
              
                <li class="dropdown"> 
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                      						
					    Welcome : Administrator
                    </a>
                  
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
       <?php include ('nav_sidebar.php');?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-5 well">
                        <div class="hero-unit-table">   
                          <div class="hero-unit-table">   
                            <?php include ('connect.php');
                            $query = mysqli_query($conn, "select * from tb_products where productID='$get_id'") or die(mysqli_error());
                            $row = mysqli_fetch_array($query);
                            ?>
						
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="alert alert-info"><strong>Edit Product</strong> </div>
                                <hr>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Name</label>
                                    <div class="controls">
                                        <input type="text" name="name" id="inputEmail" class = "form-control" value="<?php echo $row['name']; ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Description</label>
                                    <div class="controls">
                                        <input type="text"  name="description"  class = "form-control" value="<?php echo $row['description']; ?>">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Category</label>
                                    <div class="controls">
                                        <select type="text" name="category" class = "form-control" >
                                            <option><?php echo $row['category'];  ?></option>
											<option></option>
                                            <option>All_Products</option>
                                            <option>Men</option>
                                            <option>Women</option>
                                            <option>Kids</option>
                                            <option>Shoes</option>
													
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Origin</label>
                                    <div class="controls">
                                        <input type="text" name="originated" class = "form-control"  value="<?php echo $row['originated']; ?>">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Price</label>
                                    <div class="controls">
                                        <input type="text" name="price"  class = "form-control" value="<?php echo $row['price']; ?>">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Quantity</label>
                                    <div class="controls">
                                        <input type="text" name="quantity" class = "form-control"  value="<?php echo $row['quantity']; ?>">
                                    </div>
                                </div>
								
                                <div class="control-group">
                                    <label class="control-label" for="input01">Image:</label>
                                    <div class="controls">
                                        <input type="file" name="image"> 
                                    </div>
                                </div>
								
									<hr/>

                                <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="update" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
										<span><a href = "product.php" class = "btn btn-danger"> Back</a></span>
                                    </div>
                                </div>
                            </form>

                            


                        </div>
                        </div>
                        </div>
                    </div>
                </div> 
                
				
				</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
   <?php include ('script.php');?>
</body>
</html>

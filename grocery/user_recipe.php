<?php include('header.php'); ?>
<?php include('admin/connect.php'); ?>
<style>
    .qty 
    {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 8px;
    }
    /* style.css */
   

</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<body>
    <?php
    include('navtop2.php');
    ?>
    <div id="background">
        <div id="page">
            <!-- <?php include ('nav_sidebar.php');?> -->
            <div id="content">
                <div class="hero-unit-table"> 
                    <div id="header">
                        

                    </div>
                    <div id="body">
                     <!-- <div class="col-sm-6"><div id="dataTables-example_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" aria-controls="dataTables-example"></label></div></div>  -->




                        <h3>List of Our Recipes</h3>
                        

                        <ul class="thumbnails">
                            <?php
                            $query = mysqli_query($conn, "select * from recipe WHERE category = 'recipe'") or die(mysqli_error());
                            while ($row = mysqli_fetch_array($query)) {
                                $id = $row['recipeID'];
                               
                                ?>

                                <li class="span3"  style="display: flex;justify-content:center;gap: 10px;">
                                    <div class="thumbnail">
                                        <img data-src="holder.js/300x200" alt="">
                                        <div class="alert alert-info"><div class="font1"><?php echo $row['name']; ?></div></div>
                                        <hr>
                                        
                                        <img src="admin/<?php echo $row['location']; ?>" class="img-rounded" alt="" width="160" height="200">
                                        <a href="user_recipe_details.php?recipeID=<?php echo $id = $row['recipeID']; ?>">
  <data-toggle="modal" class="btn btn-success"></i>See full Recipe</a>
                                        </a>
                                       



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
											
                                            <!-- <div class="alert alert-success">&nbsp;&nbsp;&nbsp;&nbsp;Made in: <?php echo $row['originated'] ?> </div>
											<p>Price</p>
                                            <div class="alert alert-success">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['price'] ?></div> -->
                                            
                                        </div>





                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i>&nbsp;Close</button>
                                    </div>
                                </div>
                                <!-- end modal -->
                            
                            
                            <?php }?>

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
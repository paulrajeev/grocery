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

/* General Styles */
body {
  font-family: sans-serif; /* Choose a modern font family */
  margin: 0;
  padding: 0;
}

#background {
  background-color: #f5f5f5; /* Light background color */
}

/* Header Styles */
#header {
  padding: 20px;
  border-bottom: 1px solid #ddd; /* Subtle border */
}

/* Navigation Styles */
.navtop,
.nav_sidebar {
  list-style: none;
  padding: 0;
  margin: 0;
}

.navtop li,
.nav_sidebar li {
  display: inline-block;
  margin-right: 15px;
}

.navtop a,
.nav_sidebar a {
  text-decoration: none;
  color: #333;
  font-weight: bold;
}

.navtop a:hover,
.nav_sidebar a:hover {
  color: #007bff; /* Blue hover color (trend) */
}

/* Content Styles */
#content {
  padding: 20px;
}

h3 {
  margin-bottom: 15px;
}

/* Recipe List Styles */
.thumbnails {
  display: flex; /* Flexbox for responsive layout (trend) */
  flex-wrap: wrap; /* Wrap items on smaller screens */
  margin: 0 -10px; /* Remove gutters between list items */
}

.thumbnails li {
  width: 25%; /* Adjust width for desired grid layout */
  margin: 20px 10px;
}

.thumbnail {
  border: 1px solid #ddd; /* Light border */
  padding: 10px;
  background-color: #fff; /* White background */
  text-align: center; /* Center text within thumbnails */
  transition: all 0.5s ease-in-out; /* Smooth hover effect */
}

.thumbnail:hover {
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); /* Subtle hover shadow (trend) */
  transform: translateY(-3px); /* Slight upward hover animation */
}

.thumbnail img {
  margin-bottom: 10px;
}

.font1 {
  font-size: 18px; /* Adjust font size for recipe names */
  font-weight: bold; /* Make recipe names stand out */
}

/* Modal Styles (adjust as needed) */
.modal-header,
.modal-body,
.modal-footer {
  padding: 15px;
}

.modal-body img {
  margin-bottom: 15px;
}

.alert-success {
  background-color: #dff0d8; /* Lighter green for success alerts (trend) */
  border-color: #d0e0c6;
  padding: 5px 10px;
  border-radius: 5px; /* Rounded corners (trend) */
}




</style>
<body>
    <?php
    include('navtop.php');
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

                                <li class="span3" style="display: flex;justify-content:center;gap: 10px;">
                                    <div class="thumbnail" >
                                        <img data-src="holder.js/300x200" alt="">
                                        <div class="alert alert-info"><div class="font1" style="font-weight:normal;font-family: sans-serif;"><?php echo $row['name']; ?></div></div>
                                        <hr>
                                        
                                        <img src="admin/<?php echo $row['location']; ?>" class="img-rounded" alt="" width="160" height="200">
                                      
                                        <a href="order.php" class="btn btn-success" onclick="return loginToOrder()">
        <i class="icon-shopping-cart icon-large"></i>&nbsp; Login to see
    </a>

    <script>
        function loginToOrder() {
            return confirm('Please login to See full recipe. Do you want to proceed?');
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
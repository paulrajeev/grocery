<?php include ('session.php');?>	
<?php include ('header.php');?>	
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
                <!-- <a class="navbar-brand" href="index.html">e commerce&nbsp;Happy Shopping</a> -->
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
                    <div class="col-md-12">
						
						
						<div class="hero-unit-table">   
                              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <div class="alert alert-info">
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Member Table</strong>
                                </div>
                                <thead>
                                    <tr>
                                        <th>FirstName</th>
                                        <th>LastName</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Address</th>
                                  
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include ('connect.php');
                                    $query = mysqli_query($conn, "select * from tb_member") or die(mysqli_error());
                                    while ($row = mysqli_fetch_array($query)) {
                                        $member_id = $row['memberID'];
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row['Firstname']; ?></td> 
                                            <td><?php echo $row['Lastname']; ?></td> 
                                            <td><?php echo $row['Email']; ?></td> 
                                            <td><?php echo $row['Contact_Number']; ?></td> 
                                            <td><?php echo $row['address']; ?></td> 
                                                                               <td width="100">
                                              <a href="#delete_member<?php echo $member_id; ?>" role="button"  data-target = "#delete_member<?php echo $member_id;?>"data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i>&nbsp;Delete</a>
                                            </td>
                                            <!-- user delete modal -->
											<?php include ('delete_member_modal.php');?>
											
											
                                 
                                    <!-- end delete modal -->

                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
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

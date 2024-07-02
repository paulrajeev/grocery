<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('admin/connect.php'); ?>
<style>
    .form-area 
    {
        background-color: 	 #ddd;
        width: 45%;
        height:60vh;
        position: relative;
        left: 30%;
        border-radius: 10px 0 10px 0;
    }
  .bttn 
  {
    position: relative;
    left: 45%;

  }
</style>
<body>
<?php include('navtop2.php');?>
    <div id="background">
      
        <div id="page">
       
            <div id="content">
                <div class="hero-unit-table">
                    <div id="header">
                      

                    </div>
                    <div id="body">
                    <h3>Contact Us</h3>
						<h4>ITER, Siksha 'O' Anusandhan</h4>
						
						
						<h4>Call Us On
						    <a href="tel:+917008553050">  +91-8327787118 </a> </h4>
                        <hr>
						
                     <div class = "entire-form">
					<div class = "form-area">	
					
                        <form method = "POST" >
                            <label for="name"><span>name</span>
                                <input type="text" name="name" id="name">
                            </label>
                            <label for="email2"><span>email</span>
                                <input type="text" name="Email" id="email2">
                            </label>
                            <label for="message"><span>message</span>
                                <textarea id="message" style = "resize:none;" name = "message" cols="30" rows="10"></textarea>
                            </label>
                           
                            <button   class="btn btn-success bttn" name = "submit" ><i class="icon-envelope icon-large"></i>&nbsp;Submit</button>
							
                        </form>
						</div>
						
						<?php include ('admin/connect.php');
						
						if (isset ($_POST ['submit']))
						
						{
							$name = $_POST['name'];	
							$Email = $_POST['Email'];
							$message = $_POST['message'];
						
						
										mysqli_query($conn, "insert into messages(name,Email,message) VALUES('$name','$Email','$message')");
									
									echo "<script>
										alert('Your Messages Successfully Sent');
										header ('location :../index.php');
									</script>";
									 }


									 ?>		
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
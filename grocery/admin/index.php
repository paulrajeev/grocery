<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8" /> 
    <title>
      E grocery Login
    </title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<form method = "post" >
  <h1>Grocery AdminLog in</h1>
  <div class="inset">
  <p>
    <label for="email">USERNAME</label>
    <input style = "color:white;"type="text" name="username" id="email">
  </p>
  <p>
    <label for="password">PASSWORD</label>
    <input style = "color:white;" type="password" name="password" id="password">
  </p>

  </div>
   <center><p class="p-container" >
  
    <input type="submit" name="go" id="go" value="Log in">
	
  </p>
  </center>
</form>
	<?php
							include('connect.php');
							
							if(isset($_POST['go']))
							{
							
							$username=$_POST['username'];
							$password=$_POST['password'];
							
								
								$result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = 	'$username' AND password = '$password'") or die(mysqli_error());
							
								$row = mysqli_fetch_array($result);
								$numberOfRows = mysqli_num_rows($result);				
																	
																
																if ($numberOfRows == 0) 
																	{
																		echo " <br><center><font color= 'red' size='3'>Please fill up the fields correctly</center></font>";
																	} 
																else if ($numberOfRows > 0)
																	{
																	session_start();
																	$_SESSION['id'] = $row['user_id'];
																header("location:product.php");
																
															}	
							
							}
							?>
	



</body>
</html>

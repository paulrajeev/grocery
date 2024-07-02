<?php include('header.php'); ?>
<?php include('admin/connect.php'); ?>
<?php
    include('navtop.php');
    ?>
    
<?php


// Get recipe ID from URL parameter with input validation
$recipeID = filter_input(INPUT_GET, 'recipeID', FILTER_SANITIZE_NUMBER_INT);
if (!$recipeID || !is_numeric($recipeID)) {
  die('Invalid recipeID'); // Handle invalid ID gracefully
}

// Prepare SQL statement with parameterized query for security
$sql = "SELECT * FROM recipe WHERE recipeID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $recipeID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
  die('Recipe not found'); // Handle non-existent recipe
}

$recipe = $result->fetch_assoc();
$result->close();
$stmt->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $recipe['name']; ?> Recipe</title>
</head>
<style>
  body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
  position: relative;
  background-color: white;
}

* {
  box-sizing: border-box;
}
.bg-image {
  /* The image used */
  background-image: url("bg.jpg");
  /* Full height */
  height: calc(78% - 56px); /* Adjust the value to decrease the bottom gap */
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: absolute;
  top: 56px;
  left: 0;
  right: 0;
  bottom: 20px; /* Gap at the bottom */
  filter: blur(8px);
}
.bg-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 15px;
  background-color: rgba(255, 255, 255, 0.8); /* Adjust the opacity as needed */
}
  .main 
  {
    display: flex;
    justify-content: center;
    position: relative;
    top: 57px;
    height: 60vh;
    gap: 550px;
    z-index: 1;
}
 
  .main>.image 
  {
    position: relative;
    left: 190px;

  }
  .main .desc 
  {
    background-color: white;
    background-color: rgba(0,0,0,0.4);
    position: relative;
    z-index: 1;
    right: 150px;
    max-height: 57vh;
    min-width: 60vw;
    right: 155px;
    top: -43px;
    
  }
  
  /* recipe7.jpg */
</style>

<body>
<div class="bg-image"></div>
<center><h1 style="position: relative;z-index:1;color: white"><?php echo $recipe['name']; ?></h1></center> 
 <div class="main">

  <div class="image">
  <img src="admin/<?php echo $recipe['location']; ?>" alt="Recipe Image" width="300" height="300">
  </div>
 
  <div class="desc">
  
 <center><h4 style="color: white;"><b>Description:</b>
 <?php echo $recipe['description']; ?><br>
  <b style="color: white;">Ingrediants Used: </b><?php echo $recipe['ingrediants']; ?> </h4></center>
  <center><p style="color: white;"><b>Full Recipe</b></p> </center>
  <div>
    <p style="color: white;">

      <?php echo $recipe['recipe']; ?>
    </p>
</div>
  </div>

</div>

  

  
<a href="grocery/user_recipe.php"><button style="background-color: blue; 
              border: none; 
              color: white;
              padding: 15px 32px;
              text-align: center; 
              text-decoration: none;
              display: inline-block;
              font-size: 16px; 
              cursor: pointer;
              border-radius: 20px; ">Back to Recipe</button></a>
  

  <?php $conn->close(); ?>
  <div id="footer">
                        <?php include('footer.php'); ?>
                    </div>
                    <?php
    include('footer_bottom.php');
    ?>
</body>
</html>


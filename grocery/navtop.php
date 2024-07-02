 
    
    <style>
     
@import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

nav {
    background: transparent;
    padding: 0px;
    width: 100vw;
    max-width: 100vw;
    display:flex;
    justify-content: space-between;
   
}
nav .right li
{
    padding: 24px;
    list-style-type: none;
    margin-right: 23px;
}
.right>ul>li 
{
    line-height: 20px;
    padding: 20px;
    list-style-type: none;
    margin-right: 10px;
}
nav ul {
    display: flex;
    flex-direction: row;
    font-family: "Nunito", sans-serif;
    padding-inline: 13px;
    padding-top: 9px;
}

ul li {
    list-style-type: none;
    padding: 13px;
    font-size: 15px;
}
nav ul .lgn 
{
   display: flex;
   flex-direction: row-end;
}

nav a {
    text-decoration: none;
    color: black;
}
nav a:hover {
    text-decoration: none;
    color: black;
    
}

nav li:hover
{
    transform: scale(1.1);
    transition: transform 0.5s ease, color 0.5s ease;
}
nav a i:hover {
    color: black; /* Maintain text color on hover */
    text-decoration: none;
    transform: scale(1.0);
    transition: transform 0.5s ease, color 0.5s ease;
}

        </style>
        
        <nav >
            <div class = "left">

                <ul>
                    <li> <a href="index.php" > Home</a></li>
                    <li> <a href="grocery.php">  Products</a></li>
                    <li><a href="about.php"> About US</a> </li>
                    <li><a href="contact.php">Contact US</a></li>
                    <li><a href="faq.php"> FAQ </a></li>
                    <li><a href="Recipe.php"> Recipe</a></li>
                </ul>
            </div>
  <div class = "right">

      <li>
          <a href="order.php"><i class="icon-shopping-cart icon-large"></i> Login here to Order</a>
        </li>
    </div>
                    
                    
        
    </nav>
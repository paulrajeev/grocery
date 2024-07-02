<?php include('header.php'); ?>
<?php include('admin/connect.php'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBud7TlRbs/ic4AwGcFZOxg5DpPt8EgeUIgIwzjWfXQKWA3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

nav {
    background-color: #f2f2f2;
    padding: 0px;
    width: 100vw;
    max-width: 100vw;
    display: flex;
    justify-content: space-between;
}

nav .right {
    position: relative;
    right: 10px;
}

nav .right > .btn-group {
    position: relative;
    top: 18px;
    right: 25px;
}

nav .right .cart {
    position: relative;
    top: 18px;
    right: 16px;
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
    font-size: 17px;
    font-weight: normal;
}

nav ul .lgn {
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

nav li:hover {
    transform: scale(1.1);
    transition: transform 0.5s ease, color 0.5s ease;
}

nav a i:hover {
    color: black;
    text-decoration: none;
    transform: scale(1.1);
    transition: transform 0.5s ease, color 0.5s ease;
}
</style>

<nav>
    <div class="left">
        <ul>
            <li><a href="user_index.php">Home</a></li>
            <li><a href="user_grocery.php">Products</a></li>
            <li><a href="user_about.php">About Us</a></li>
            <li><a href="user_contact.php">Contact Us</a></li>
            <li><a href="user_faq.php">FAQ</a></li>
            <li><a href="user_recipe.php">Recipe</a></li>
        </ul>
    </div>
    <div class="right">
        <div class="btn-group">
        <a href="order.php" class="btn" onclick="return logout()">
        <i class="icon-cog icon-large"></i>&nbsp;Log out
    </a>
    <script>
        function logout() {
            return confirm('Are you sure you want to log out?');
        }
    </script>
        </div>
        <div class="btn-group cart">
            <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="icon-shopping-cart icon-large"></i>&nbsp;My Cart
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="user_cart.php">My Cart</a></li>
                <li><a class="dropdown-item" href="user_deal.php">Deal Cart</a></li>
            </ul>
        </div>
    </div>
</nav>

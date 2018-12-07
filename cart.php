<?php

    include 'functions.php';
    session_start();

    //If 'removeId' has been sent, search the cart for that productName and unset it
    if(isset($_POST['removeId'])) {
        foreach($_SESSION['cart'] as $itemKey => $item) {
            if($item['productId'] == $_POST['removeId']) {
                unset($_SESSION['cart'][$itemKey]);
            }
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <title>SSL FINAL</title>
        
    </head>
    <body class = 'bg-info'>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="http://csumb.edu">CSUMB</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href='index.php' id='home'>
                    <i class="fas fa-home"></i>
                    Home<span class="sr-only">(current)</span> </a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="catalog.php" id = 'catalog'>
                    <i class="fas fa-book"></i>
                    Catalog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="adminPage/login.php" id = 'login'>
                    <i class="fas fa-sign-in-alt"></i>
                    Login</a>
              </li>
                <li class="nav-item">
                <a class="nav-link" href="about.php" id = 'about'>
                    <i class="fas fa-info-circle"></i>
                    About Us</a>
              </li>
                <li class="nav-item">
                    <a class="nav-link" href='cart.php'>
                        <i class="fas fa-shopping-cart"></i>
                        Cart: <?php displayCartCount(); ?> </a></li>
                    </a>
                </li>
            </ul>
          </div>
        </nav>
        <div>
            <p>
                <h2>Shopping Cart</h2>
                <!-- cart items -->
                <?php
                    displayCart();
                ?>
            </p>
        </div>
        
        <script src="js/js.js"></script>
    </body>
</html>
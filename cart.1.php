<?php
session_start();
// if(isset($_SESSION['cart'])) {
//     echo $_SESSION['cart'];
// }
function displayCart() {
    if(isset($_SESSION['cart'])) {
        echo "<table class='table'>";
        foreach($_SESSION['cart'] as $item) {
            $productName = $item['productName'];
            $price = $item['price'];
            
            //display item as table row
            echo "<tr>";
            echo "<td><h4>$productName</h4></td>";
            echo "<td><h4>$price</h4></td>";
            
            //remove button here
            echo "<form method='post'>";
            echo "<input type='hidden' name='removeId' value='$productName'>";
            echo "<td><button class='btn btn-danger'>Remove</button></td>";
            echo "</form>";
            
            echo "</tr>";
        }
        echo "</table>";
    }
}
    //If 'removeId' has been sent, search the cart for that productName and unset it
    if(isset($_POST['removeId'])) {
        foreach($_SESSION['cart'] as $itemKey => $item) {
            if($item['productName'] == $_POST['productName']) {
                unset($_SESSION['cart'][$productName]);
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>SSL FINAL</title>
        
        <link  href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <h1>Section Six Lab Island Mart</h1>
        <nav>
            <a href="index.php" id="homepage">Home</a>
            <a href="catalog.php">Catalog</a>
            <a href="adminPage/login.php">AdminLogin</a>
            <a href="about.php">About Us</a> <!-- or maybe contacts? idk-->
            <a href="cart.php">Cart</a>
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
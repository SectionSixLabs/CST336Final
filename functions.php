<?php

function displayCart() {
    if(isset($_SESSION['cart'])) {
        echo "<table class='table'>";
        foreach($_SESSION['cart'] as $item) {
            $productId = $item['productId'];
            $productName = $item['productName'];
            $price = $item['price'];
            
            //display item as table row
            echo "<tr>";
            echo "<td><h4>$productName</h4></td>";
            echo "<td><h4>$price</h4></td>";
            
            //remove button here
            echo "<form method='post'>";
            echo "<input type='hidden' name='removeId' value='$productId'>";
            echo "<td><button class='btn btn-danger'>Remove</button></td>";
            echo "</form>";
            
            echo "</tr>";
        }
        echo "</table>";
    }
}

function displayCartCount() {
    echo count($_SESSION['cart']);
}

?>

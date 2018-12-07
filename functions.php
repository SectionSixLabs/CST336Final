<?php

function displayCart() {
    // if there are islands in the Session, display them
    if(isset($_SESSION['cart'])) {
        echo "<table class='table'>";
        foreach($_SESSION['cart'] as $item) {
            $productId = $item['productId'];
            $productName = $item['productName'];
            $price = $item['price'];
            
            // display data as table row
            echo "<tr>";
            echo "<td><img src='" . $item['img'] . "'></td>";
            echo "<td><h4>$productName</h4></td>";
            echo "<td><h4>$price</h4></td>";
            
            // updating form for remove button
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

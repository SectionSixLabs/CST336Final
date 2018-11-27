<?php

    include "../dbConnection.php";
    
    $conn = getDatabaseConnection("islandStore");
    
    $sql = "DELETE
            FROM is_product
            WHERE productId = " . $_GET['productId'];
            
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location:admin.php");

?>
<?php

    include "../dbConnection.php";
    
    $conn = getDatabaseConnection("islandStore");
    
    $sql = "DELETE
            FROM categoryId
            WHERE categoryId = " . $_GET['categoryId'];
            
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location:admin.php");

?>
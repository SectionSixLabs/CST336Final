<?php

    include '../dbConnection.php';
    $dbConn = getDatabaseConnection("islandStore");    
    $sql = "SELECT * 
            FROM is_product 
            WHERE id = :productId";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute(array("id"=>$_GET['productId']));
    $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($resultSet);
        
?>
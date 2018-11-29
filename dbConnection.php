<?php

function getDatabaseConnection($dbname = 'islandStore'){
    
    // mysql://b2c39898989a45:2d0f1e07@us-cdbr-iron-east-01.cleardb.net/heroku_dac37addba7e971?reconnect=true

    $host = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b4833a1ad5d926";
    $password = "971f7f45";
    $dbname = "heroku_e30237eff3ac9ac";
    $charset = 'utf8mb4';
    
    try {
            $dbconn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $dbconn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbconn;
        } catch(PDOException $e) {
            print('ERROR:'.$e->getMessage());
            exit;
    }
    return $dbconn; 

}
?>

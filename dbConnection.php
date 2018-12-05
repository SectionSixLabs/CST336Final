<?php
function getDatabaseConnection($dbname = 'heroku_dac37addba7e971') {
    $host = 'localhost';
    
    $username = 'root';
    $password = '';
    
    // when connecting from Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') != false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbname = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } else {
    // when connecting from test env
        $host = "us-cdbr-iron-east-01.cleardb.net";
        $username = "b2c39898989a45";
        $password = "2d0f1e07";
        $dbname = "heroku_dac37addba7e971";
        $charset = 'utf8mb4';
    }
    
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

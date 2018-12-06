<?php
function getDatabaseConnection($dbname = 'heroku_e30237eff3ac9ac') {
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
        $username = "b4833a1ad5d926";
        $password = "971f7f45";
        $dbname = "heroku_e30237eff3ac9ac";
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

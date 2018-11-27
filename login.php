<?php

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
            <a href="login.php">Login</a>
            <a href="about.php">About Us</a> <!-- or maybe contacts? idk-->
            <a href="cart.php">Cart</a>
        </nav>
        
        <div>
            <p>
                login
            </p>
        </div>
        
        <div>
            <form method="POST" action="admin.php">
                Username: <input type="text" name="username"/><br />
                Password: <input type="password" name="password"/><br />
    
                <input type="submit" name="submitForm" value="Login!"/>
            
                <?php //php stuff here?>
            </form>
        </div>
        
        <script src="js/js.js"></script>
    </body>
</html>
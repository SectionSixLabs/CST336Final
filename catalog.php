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
            <a href="adminPage/login.php">AdminLogin</a>
            <a href="about.php">About Us</a> <!-- or maybe contacts? idk-->
            <a href="cart.php">Cart</a>
        </nav>
        
        <div>
            <h3>Island Shopper</h3>
        </div>
        
        <div>
            <form>
                Product: <input type="text" name="product" />
                <br>
                Price: From <input type="text" name="priceFrom" size="7"/>
                        To  <input type="text" name="priceTo" size="7"/>
                <br>
                Order result by:
                <br>
                
                <input type="radio" name="orderBy" value="price"/>Price <br>
                <input type="radio" name="orderBy" value="name"/>Name
                <br><br>
                
                <input type="submit" value="Search"searchForm" />
            </form>
        </div>
        
        <script src="js/js.js"></script>
    </body>
</html>
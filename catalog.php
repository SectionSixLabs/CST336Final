<?php
session_start();
include 'dbConnection.php';

$conn = getDatabaseConnection('islandStore');

if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
//check to see if an item has been added to the cart
if(isset($_POST['productName'])) {
    
    //creating an array to hold an items properties
    $newItem = array();
    $newItem['productName'] = $_POST['productName'];
    $newItem['price'] = $_POST['price'];
    
    //can't have multiple of same island
    //is there a need to check cart for multiples of same island?
    $newItem['quantity'] = 1;
    array_push($_SESSION['cart'], $newItem);
        
}

function displaySearchResults() {
    global $conn;
    
    if(isset($_GET['searchForm'])) { //check if user has submitted form
        echo "<h3>Products Found: </h3>";
        
        $namedParameters = array();
        
        $sql = "SELECT * FROM is_product where 1";

        if(!empty($_GET['product'])) {
            $sql .=" AND productName LIKE :productName";
            $namedParameters[":productName"] = "%" . $_GET['product'] . "%";
        }
        
        if(!empty($_GET['priceFrom'])) { //check "Price from" text box
            $sql .= " AND price >= :priceFrom";
            $namedParameters[":priceFrom"] = $_GET['priceFrom'];
        }
        
        if(!empty($_GET['priceTo'])) { //check "Price to" text box
            $sql .= " AND price <= :priceTo";
            $namedParameters[":priceTo"] = $_GET['priceTo'];
        }
        
        if(isset($_GET['orderBy'])) {
            if($_GET['orderBy'] == "price") {
                $sql .= " ORDER BY price";
            } else {
                $sql .= " ORDER BY productName";
            }
        }
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        //echo "<div>$sql</div>";
        
        echo "<table class='table'>";
        
        foreach($records as $record) {
            $productName = $record["productName"];
            $price = $record["price"];
        
            echo "<tr>";
            echo "<td>";
            echo $productName . " " . $record["productDescription"] . " $" . $price . "<br /><br />";
            echo "</td>";
        
            echo "<td>";
            //hidden input element containing item 
            echo "<form method='post'>";
            echo "<input type='hidden' name='productName' value='$productName'>";
            echo "<input type='hidden' name='price' value='$price'>";
            
            echo '<button class="btn btn-success">Add</button>';
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}

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
                
                <input type="submit" value="Search" name="searchForm" />
            </form>
        </div>
        
        <hr>
        <div>
        <?= displaySearchResults() ?>
        </div>
        
        <script src="js/js.js"></script>
    </body>
</html>
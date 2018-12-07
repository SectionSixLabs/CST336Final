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
    $newItem['productId'] = $_POST['productId'];
    $newItem['productImage'] = $_POST['productImage'];
    
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
        
        echo "<hr><table class='table'>";
        
        foreach($records as $record) {
            $productName = $record["productName"];
            $price = $record["price"];
            $productImage = $record["productImage"];
            $productId = $record["productId"];
        
            echo "<tr>";
            echo "<td>";
            echo $productName . " " . $record["productDescription"] . " $" . $price . "<br /><br />";
            echo "</td>";
        
            echo "<td>";
            //hidden input element containing item 
            echo "<form method='post'>";
            echo "<input type='hidden' name='productName' value='$productName'>";
            echo "<input type='hidden' name='price' value='$price'>";
            echo "<input type='hidden' name='productImage' value='$productImage'>";
            echo "<input type='hidden' name='productId' value='$productId'>";
            
            if($_POST['itemId'] == $itemId) {
                echo "<button class='btn btn-success'>Added</button>";
            } else {
                echo "<button class='btn btn-warning'>Add</button>";
            }
            
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
}

?>

<?php

    session_start();
    include 'functions.php';
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <title>SSL FINAL</title>
        
    </head>
    <body class = 'bg-info'>
        <!-- NAVIGATION ICONS -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="http://csumb.edu">CSUMB</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href='index.php' id='home'>
                    <i class="fas fa-home"></i>
                    Home</a>
            </li>
              <li class="nav-item  active">
                <a class="nav-link" href="catalog.php" id = 'catalog'>
                    <i class="fas fa-book"></i>
                    Catalog<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="adminPage/login.php" id = 'login'>
                    <i class="fas fa-sign-in-alt"></i>
                    Login</a>
              </li>
                <li class="nav-item">
                <a class="nav-link" href="about.php" id = 'about'>
                    <i class="fas fa-info-circle"></i>
                    About Us</a>
              </li>
                <li class="nav-item">
                    <a class="nav-link" href='cart.php'>
                        <i class="fas fa-shopping-cart"></i>
                        Cart: <?php displayCartCount(); ?> </a></li>
                    </a>
                </li>
            </ul>
          </div>
        </nav>

    <h1 class="display-3">Island Shopper</h1>
    
    <div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:1250px;" role="document" >
        <div class="modal-content" >
            <div class="modal-header" >
            <h5 class="modal-title" id="bookModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <div id="bookInfo"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    
    <div class='container'>
        <div class='text-center'>
            
            </br>
            <div class = "col-md-6 offset-md-3">
            <!-- Search Form -->
            <form enctype="text/plain">
                <div class="form-group">
                    <label for="bName"><strong>Product</strong></label>
                    <input type="text" class="form-control" name="product" id="bName" placeholder="Book Name">
                </div>
                <div class="form-group">
                    <label for="bName"><strong>Developer</strong></label>
                    <input type="text" class="form-control" name="publisher" id="bName" placeholder="Publisher">
                </div>
                <label for="bName"><strong>Region</strong> </label><br />
                <select class="custom-select" name="genres">
                    <option value=""> Select One </option>
                    <option value='7' >Children's Book</option><option value='5' >Comics & Graphic Novels</option><option value='1' >Fantasy Fiction</option><option value='6' >Health and Fitness</option><option value='4' >History</option><option value='2' >Horror</option><option value='3' >Science Fiction</option>                </select>
                <br /><br />
                
                
                <label for="bName"><strong>Price</strong></label>
                <div class="input-group mb-3">

                    <div class="input-group-prepend">
                        <span class="input-group-text">From:</span>
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text" name="priceFrom" class="form-control" aria-label="Amount (to the nearest dollar)">
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
                <div class="input-group mb-3" >
                    <div class="input-group-prepend" >
                        <span class="input-group-text">To: </span>
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text" name="priceTo" class="form-control" aria-label="Amount (to the nearest dollar)">
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>
                <label for="bName"><strong>Order result by: </strong></label><br />
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="orderBy"  value="priceA" class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline1">Price (ASC)</label>
                </div>
                <br />
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="orderBy" value="priceD"class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline2">Price (DESC)</label>
                </div>
                <br />
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline3" name="orderBy" value="name"class="custom-control-input">
                    <label class="custom-control-label" for="customRadioInline3">Name</label>
                </div>
                <br /><br />
                <input type="submit" name = "searchForm" value="Search" class="btn btn-default">
                <br /><br />
            </form>
            </div>
            
            <div>
            <?= displaySearchResults() ?>
            </div>
        
            <script>
    
            $(document).ready(function(){
    
            //$("#adoptionsLink").addClass("active");
            
            $(".bookLink").click(function(){
                
                //alert(  );
                
                $('#bookModal').modal("show");
                $("#bookInfo").html("<img src='img/loading.gif'>");
                      
                
                $.ajax({

                    type: "GET",
                    url: "api/getBookInfo.php",
                    dataType: "json",
                    data: { "bookId": $(this).attr("id")},
                    success: function(data,status) {
                       //alert(data.breed);
                       //log.console(data.pictureURL);
                       
                       $("#bookModalLabel").html("<h2>" + data.bookName +"</h2>");
                       $("#bookInfo").html("");
                       $("#bookInfo").append("<img src='" + data.bookImage +"' width='200' >"+ "<br><br>");
                       $("#bookInfo").append("<strong>Author:</strong> " + data.firstName + " " + data.lastName + "<br><br>");
                       $("#bookInfo").append("<strong>Description:</strong>  " + data.bookDescription + "<br><br>");
                       $("#bookInfo").append("<strong>Publisher:</strong>  " + data.bookPublisher + "<br><br>");
                       $("#bookInfo").append("<strong>Year Published:</strong>  " + data.publishYear + "<br><br>");
                       $("#bookInfo").append("<strong>Genre:</strong>  " + data.genreName + "<br><br>");
                       $("#bookInfo").append("<strong>Genre Description:</strong>  " + data.genreDescription + "<br><br>");
                       $("#bookInfo").append("<strong>Price:</strong>  $" + data.price + "<br><br>");
                    
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                    //alert(status);
                    }
                });//ajax
            });
    }); //document ready
</script>
            <!-- Display Search Results -->

                        
            <div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="width:1250px;" role="document" >
                    <div class="modal-content" >
                        <div class="modal-header" >
                        <h5 class="modal-title" id="bookModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <div id="bookInfo"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
include 'inc/footer.php'; ?>

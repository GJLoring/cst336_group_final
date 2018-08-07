<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include './dbConnection.php';
    include 'functions.php';

    $conn = getDatabaseConnection("store");

    function displaySearchResults(){
        global $conn;

        if(isset($_GET['searchForm'])){
            echo "<h3>Products Found:</h3>";

            $namedParameters = array();

            $sql = "SELECT * FROM cellstore_product WHERE 1";

            if(!empty($_GET['product'])){
                $sql .= " AND productName LIKE :productName";
                $namedParameters[":productName"] = "%" . $_GET['product']."%";
            }

            if(!empty($_GET['category'])){
                $sql .= " AND catId = :categoryId";
                $namedParameters[":categoryId"] = $_GET['category'];
            }

            if(!empty($_GET['priceFrom'])){
                $sql .= " AND price >= :priceFrom";
                $namedParameters[":priceFrom"] =  $_GET['priceFrom'];
            }

            if(!empty($_GET['priceTo'])){
                $sql .= " AND price <= :priceTo";
                $namedParameters[":priceTo"] = $_GET['priceTo'];
            }

            if(isset($_GET['orderBy'])){
                if($_GET['orderBy']=='price'){
                    $sql .= " ORDER BY price";
                }
                else{
                    $sql .= " ORDER BY productName";
                }
            }

            echo $sql;
            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($records as $record){
                echo "<a href=\"purchaseHistory.php?productId=".$record["productId"]. "\"> History </a>";
                echo  $record["productName"] . " " . $record["productDescription"] . " $" . $record["price"] . "<br /><br />";
            }
        }
    }

    function displayCategories(){
        global $conn;

        $sql = "SELECT catID, catName from cellstore_category ORDER BY catName";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($records as $record){
            echo "<option valu='".$record["catId"]."'>".$record["catName"]."</option>";
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <title> CST336 Group Final </title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div>
            <h1> CST336 Cell Phone Electronics Online Store </h1>
            <!-- Bootstrap Navagation Bar -->
                <nav class='navbar navbar-default - navbar-right'>
                    <ul class='nav navbar-nav'>
                        <li><a href='index.php'>Home</a></li>
                        <li><a href='cart.php'>
                            <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span>
                            Cart: </a></li>

                        <li><a href='login.php'>Login</a></li>
                    </ul>
                </nav>
                <br /><br />
            <br />
        </div>
        <div>
            <form>
                
                Product: <input type="text" name="product" />
                <br />
                Category: 
                    <select name="category">
                        <option value=""> Select One </option>
                        <?=displayCategories()?>
                    </select>
                <br>
                
                Price: From <input type="text" name="priceFrom" size="7" />
                       To   <input type="text" name="priceTo" size="7" />
                       
                <br>
                    Order result by: 
                <br>
                
                <input type="radio" name="orderBy" value="price"/> Price <br />
                <input type="radio" name="orderBy" value="name"/> Name
                
                <br><br>
                <input type="submit" value="Search" name="searchForm" />
                
            </form>
        </div>
        <hr>
        <?=displaySearchResults()?>
        <footer>
            <hr>
            Disclaimer<br />
            <strong>Disclaimer:</strong>The information on the website is used for academic purposes.<br />
            ©2018 Team Hopper

       </footer>
    </body>
</html>

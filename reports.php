<?php

    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    include './dbConnection.php';
    $conn = getDatabaseConnection("store2");

    function getCategories(){
        global $conn;

        $sql = "SELECT catId, catName from category ORDER BY catName";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($records as $record){
            echo "<option value='".$record["catId"]."'>".$record['catName']."</option>";
        }
    }

    if(isset($_GET['submitProduct'])){
        $productName = $_GET['productName'];
        $productDescription = $_GET['catDescription'];
        $productImage = $_GET['productImage'];
        $productPrice = $_GET['price'];
        $catId = $_GET['catId'];

        $sql = "INSERT INTO product
        ( productName, productDescription, productImage, price, catId)
        VALUES ( :productName, :productDescription, :productImage, :price, :catId)";

        $namedParameters = array();
        $namedParameters[':productName'] = $productName;
        $namedParameters[':productDescription'] = $productDescription;
        $namedParameters[':productImage'] = $productImage;
        $namedParameters[':price'] = $productPrice;
        $namedParameters[':catId'] = $catId;
        $statement = $conn->prepare($sql);
        $statement->execute($namedParameters);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Reports</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <h1>  CST336 Cell Phone Electronics Online Store Reports </h1>
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>

        <?php
            $sql = "SELECT * from users";  
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            echo '<table>';
            echo "<tr>";
            echo '<div align="left">';
            echo "</br>Customers</br>";
            echo "</div>";            
            echo "</tr>";
            echo "<tr>";
            echo "<td>First Name</td>";
            echo "<td>Last Name</td>";
            echo "<td>User Name</td>";
            echo "</tr>";            
            foreach ($items as $record) {
                echo "<tr>";
                echo "<td>" .$record['fistName']."</td>";
                echo "<td>" .$record['lastName']. "</td>";
                echo "<td>" .$record['userName']. "</td>";
                echo "</tr>";
            }
            echo "</table></br>";
            
            $sql = "SELECT purchase.Product, SUM(product.UnitPrice) as total FROM product INNER JOIN purchase ON product.productName=purchase.Product";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            echo '<table>';
            echo "<tr>";
            echo '<div align="left">';
            echo "</br>Total Sales By Product</br>";
            echo "</div>";            
            echo "</tr>";
            echo "<tr>";
            echo "<td>Product</td>";
            echo "<td>Sales</td>";
            echo "</tr>";            
            foreach ($items as $record) {
                echo "<tr>";
                echo "<td>" .$record['Product']."</td>";
                echo "<td>" .$record['total']. "</td>";
                echo "</tr>";
            }
            echo "</table></br>";
            
            
            $sql = "SELECT category.catName, AVG(product.UnitPrice) as total FROM product INNER JOIN category ON category.catId=product.category";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        
            echo '<table>';
            echo "<tr>";
            echo '<div align="left">';
            echo "</br>Average Sales By Product Line</br>";
            echo "</div>";            
            echo "</tr>";
            echo "<tr>";
            echo "<td>Product</td>";
            echo "<td>Average Unit Cost</td>";
            echo "</tr>";            
            foreach ($items as $record) {
                echo "<tr>";
                echo "<td>" .$record['catName']."</td>";
                echo "<td>" .$record['total']. "</td>";
                echo "</tr>";
            }
            echo "</table></br>";
        ?>

    </body>
</html>

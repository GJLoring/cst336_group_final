<?php
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(!isset($_SESSION['userLevel']))
    {
     echo " 8. Debug message userLevel not set:";
     header("Location:login.php");
    }
    include './dbConnection.php';
    $conn = getDatabaseConnection("store");
    //header("Location: admin.php");


    function displayAllProducts(){
        global $conn;
        $sql = "SELECT * FROM cellstore_product ORDER BY productId";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $records;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script>
            function confirmDelete(){
                return confirm("Are you sure you want to delete this product?");
            }
        </script>
    </head>
    <body>
        <h1> CST336 Cell Phone ELectronics Online Store  Product Admin </h1>
        <form action="report.php">
            <input type="submit" class = 'btn btn-secondary' id = "begining" name="report" value="Generate Report"/>
        </form>
        <form action="addProduct.php">
            <input type="submit" class = 'btn btn-secondary' id = "begining" name="addproduct" value="Add Product"/>
        </form>
        <form action="logout.php">
            <input type="submit" class = 'btn btn-secondary' id = "begining" value="Logout"/>
        </form>
        <?php $records=displayAllProducts();
            echo "<table class ='table table-hover'>";
            echo "<thead>
                    <tr>
                    <th scope='col'>Name</th>
                    <th scope='col'>Description</th>
                    <th scope='col'>Price</th>
                    <th scope='col'>Update</th>
                    <th scope='col'>Remove</th>
                    </tr>
                    </thead>";
            echo "<tbody>";
            foreach ($records as $record) {
                echo "<tr>";
                echo "<td>" .$record['productName']."</td>";
                echo "<td>" .$record['productDescription']. "</td>";
                echo "<td>" .$record['price']. "</td>";
                echo "<td><a class = 'btn btn-primary' href='updateProduct.php?productId=".$record['productId']."'>Update</a></td>";
                echo "<form action='deleteProduct.php' onsubmission='return confirmDelete()'>";
                echo "<input type='hidden' name='productID' value= ". $record['productId']."/>";
                echo "<td><input type='submit' class='btn btn-danger' value='Remove'></td>";
                echo "</form>";
            }
            echo"</tbody>";
            echo "</table>";
        ?>
    </body>
</html>

<?php

   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

	include './dbConnection.php';
	$conn = getDatabaseConnection("store");
    //if(isset($_GET['itemId'])){
    //    $product = getProductInfo();
    //}

  function getCategories($itemId)
    {
        global $conn;
        $sql = "SELECT itemId, catName FROM category ORDER BY catName";

        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($records as $record){
            echo "<option ";
            echo ($record["itemId"] == $itemId)? "selected": "";
            echo " value = '" .$record["itemId"]."'>".$record['catName']."</option>";
        }
    }

    function getProductInfo()
    {
        global $conn;
        $sql = "SELECT * FROM product WHERE catId = ". $_GET['catId'];

        $statement = $conn->prepare($sql);
        $statement->execute();
        $record = $statement->fetch(PDO::FETCH_ASSOC);

        return $record;
    }


    if(isset($_GET['catId'])){

        $sql = "UPDATE product
                SET productName = :productName,
                    description = : description,
                    image = :image,
                    unitPrice = :unitPrice,
                    itemId = :itemId
                WHERE productId = :productId";
        $np = array();
        $np[":productName"] = $_GET['productName'];
        $np[":description"] = $_GET['description'];
        $np[":image"] = $_GET['image'];
        $np[":unitPrice"] = $_GET['unitPrice'];
        $np[":itemId"] = $_GET['itemId'];
        $np[":productId"] = $_GET['productId'];

        $statement = $conn->prepare($sql);
        $statement->execute($np);
        echo "Product has been updated!";

    }
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update Product</title>        
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
    <h1>Product Update </h1>
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
        <a href="addProduct.php">Add Product</a>
        <a href="updateProduct.php">Update Product</a>
    <form>
        <input type="hidden" name="productId" value="<?=$product['productId']?>"/>
        <strong>Product Name</strong> <input = "text" class="form-control" value="<?=$product['productName']?>" name= "productName"><br>
        <strong>Description</strong><textarea name="description" class="form-control" cols=50 rows = 4>value="<?=$product['description']?>" </textarea><br>
        <strong>Unit Price</strong><input type="text" class="form-control" name="unitPrice">value="<?=$product['unitPrice']?>" <br>
        
        <strong>Catagory</strong><select name="itemId" class="form-control">
            <option value="">Select One</option>
            <?php getCategories($product['itemId']); ?>
        </select><br />
        <strong>Set image URL</strong><input type="text" name="image" class="form-control"> value="<?=$product['image']?>" <br>
        <input type="submit" name="submitProduct" class="btn bnt-primary" value="Update Product">
    </form>
    </body>
</html>
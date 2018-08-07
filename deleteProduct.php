<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    include './dbConnection.php';  
    $conn = getDatabaseConnection("store");
    $sql = "DELETE FROM cellstore_product WHERE productId = " . $_GET['productId'];    
    echo $sql;
    $statement = $conn->prepare($sql);
    $statement->execute();
    header("Location: admin.php");
?>
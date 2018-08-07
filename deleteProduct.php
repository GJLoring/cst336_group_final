<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    include './dbConnection.php';  
    $conn = getDatabaseConnection("store");
    $sql = "DELETE FROM om_product WHERE productId = " . $_GET['productId'];    
    $statement = $conn->prepare($sql);
    $statement = $conn->prepare($sql);
    $statement->execute();
    header("Location: admin.php");
?>
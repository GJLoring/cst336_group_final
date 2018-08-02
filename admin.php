<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    session_start();
    if(!isset($_SESSION['userLevel']))
    {
     echo " 8. Debug message userLevel not set:";
     header("Location:login.php");
    }
    include './dbConnection.php';
    $conn = getDatabaseConnection("cst336_final");

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

        TODO </BR>
        Admin can update table content </BR>
        Admin can insert new record </BR>
        Admin can delete records </BR>            
        Admin can gen 3 reports, Average product price, number of users, Sales qty?  </BR>
        TODO </BR>
    </body>
</html>

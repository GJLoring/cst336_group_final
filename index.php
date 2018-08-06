<?php 
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
 ?>
 
<?php
    include './dbConnection.php';

    $conn = getDatabaseConnection("store");
      
?>

<?php
    include 'functions.php';
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

            Navigation Bar Goes here ( Home / Login / Cart )
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
            <a href="login.php">( Replace Me Login )</a>

            <br />
        </div>
        TODO </br>
        Create Database
        <hr>
        <footer>
            <hr>
            Disclaimer<br />
            <strong>Disclaimer:</strong>The information on the website is used for academic purposes.<br />
            ©2018 Team Hopper

       </footer>
    </body>
</html>

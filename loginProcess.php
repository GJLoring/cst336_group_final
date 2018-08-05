<?php

   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
   include './dbConnection.php';

   $conn = getDatabaseConnection("store");
   //echo " 1. Debug message:". isset($_POST['loginForm']);
   //echo " 2. Debug message:". $_POST['username'];
   //echo " 3. Debug message:". $_POST['password'];
   //if (isset($_POST['loginForm'])) { //Check me 

      //echo " 4. Debug message:". $_POST['username'];
      //echo " 5. Debug message:". $_POST['password'];
      $username = $_POST['username'];
      $password = sha1($_POST['password']); 
      
      
      $sql = "SELECT *
      FROM users
      WHERE username = :username
      AND password = :password";  
      
      $np = array();
      $np[':username'] = $username;
      $np[':password'] = $password;
      
      $stmt = $conn->prepare($sql);
      $stmt->execute($np);
      $record = $stmt->fetch(PDO::FETCH_ASSOC);
      
      if (empty($record)) {
         echo " 6. Debug message record not found:". $_POST['username'];
         $_SESSION['incorrect'] = true;
         header("Location: login.php");
      } else {
         echo " 7. Debug message record found:". $_POST['username'];
         $_SESSION['incorrect'] = false;
         $_SESSION['loginName'] = $record['firstName'] . " " . $record['lastName'];
         $_SESSION['userLevel'] = $record['loginLevel'];
         echo " 8. Debug message record found:". $_POST['loginName'];
         header("Location:admin.php");
      }
   //}
?>

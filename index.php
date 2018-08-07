<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_SESSION['loginName'])){
    }
    else{
      header("Location:login.php");
    }

    include './dbConnection.php';
    $conn = getDatabaseConnection("store");
    include("header.php");
    include ("functions.php");

    $conn = getDatabaseConnection("store");

    function displaySearchResults(){
        global $conn;

        if(isset($_GET['searchForm'])){
            echo "<h3>Products Found:</h3>";

            $namedParameters = array();

            $sql = "SELECT * FROM cellstore_product";

            if(!empty($_GET['category'])){
                $sql .= " WHERE catId = :catId";
                $namedParameters[":catId"] = $_GET['category'];
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







<!-- Navbar =============================================== -->
<div class="span12">     
<h4>Latest Products</h4>
      <ul class="thumbnails">
        <?php
            $sql = "SELECT * from category right JOIN product ON category.catName=product.category";  
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <?php
            foreach ($items as $key => $value) {
              echo('<li class="span4">
                  <div class="thumbnail">
                    <a  href="#"><img src="themes/images/products/6.jpg" alt=""/></a>
                    <div class="caption">
                      <h5>'.$value['productName'].'</h5>
                      <p> 
                        '.$value['description'].'
                      </p>

                      <h4 style="text-align:center">
                        <a class="btn" href="#"> 
                            <i class="icon-zoom-in"></i></a> 
                                <a class="btn" onclick=addtocart("'.$value['itemId'].'") >"'.$value['itemId'].'" Add to 
                                    <i class="icon-shopping-cart"></i></a>
                                     <a class="btn btn-primary" href="#">$'.$value['UnitPrice'].'
                                </a>
                        </h4>
                    </div>
                  </div>
                </li>');
            }
        ?>
      </ul> 
    <button style="margin-left: 42%;height: 50px;width: 150px" class="btn btn-success">Loadmore</button>
</div>


<!----====================================Call to Footer============================------>
<?php include("footer.php");?>









<!--------========================COMMENTING OUT THIS ENTIRE SECTION===================================================

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
<!--------========================COMMENTING OUT THIS ENTIRE SECTION===================================================
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
<!--------========================COMMENTING OUT PHP < ?= displayCategories()?>==================================================
                        
                    </select>
                <br>
                
                <br><br>
                <input type="submit" value="Search" name="searchForm" />
                
            </form>
        </div>
        <hr>
<!--------========================COMMENTING OUT PHP < ?= displaySearchResults()?>==================================================
        <footer>
            <hr>
            Disclaimer<br />
            <strong>Disclaimer:</strong>The information on the website is used for academic purposes.<br />
            ©2018 Team Hopper

       </footer>
    </body>
</html>
===========================END COMMENTS==========================================================->

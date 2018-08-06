<?php
    include 'functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title> CST336 Group Final </title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        <div>
            <h1> Shopping Cart </h1>

            <!-- Bootstrap Navagation Bar -->
                <nav class='navbar navbar-default - navbar-right'>
                    <ul class='nav navbar-nav'>
                        <li><a href='index.php'>Home</a></li>
                        <li><a href='cart.php'>
                        <span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span>
                    </ul>
                </nav>
                <br /><br />
            <br />
        </div>
        <div class="container">
          <table id="cart" class="table table-hover table-condensed">
            <thead>
              <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td data-th="Product">
                  <div class="row">
                    <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive" /></div>
                    <div class="col-sm-10">
                      <h4 class="nomargin">Product 1</h4>
                      <p><?php displayDescription() ?></p>
                    </div>
                  </div>
                </td>
                <td data-th="Price">$1.99</td>
                <td data-th="Quantity">
                  <input type="number" class="form-control text-center" value="1">
                </td>
                <td data-th="Subtotal" class="text-center">1.99</td>
                <td class="actions" data-th="">
                  <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                  <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr class="visible-xs">
                <td class="text-center"><strong>Total 1.99</strong></td>
              </tr>
              <tr>
                <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
              </tr>
            </tfoot>
          </table>
        </div>
        
        <hr>
        <footer>
            <hr>
            Disclaimer<br />
            <strong>Disclaimer:</strong>The information on the website is used for academic purposes.<br />
            ©2018 Team Hopper

       </footer>
    </body>
</html>

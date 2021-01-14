<!DOCTYPE html>
    <html>
        <head>
            <title>Dairy Products</title>
            <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
            <link rel = "stylesheet" type = "text/CSS" href = "StyleCSS.css">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
                integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
            <link rel="icon" href="Images/FruitCartLogo.png">
        </head>

        <body onload="loadAisleQuantity('milkQuantity', 'creamQuantity', 'butterQuantity', 'cheeseQuantity'); updateAislePrice('milk', 'cream', 'butter', 'cheese');">

            <nav class="logo-bar navbar navbar-expand-lg navbar-light justify-content-between">
                <a class="navbar-brand" href = "index.php">
                    <img class="main-logo" src = "Images/FruitCartLogo.png">
                    <span class="navbar-icon-label">FRESHFAMILY MARKET</span>
                </a>
                <div class="navbar-right">
                    <a href = "Cart.php">
                        <img class = "icons" src = "Images/AddToCart.png">
                        <span class="navbar-icon-label mr-4">My Cart</span>
                    </a>
                    <a href = "SignIn.php">
                        <img class = "icons" src = "Images/SignInIconOnly.png">
                        <span class="navbar-icon-label">Sign In</span>
                    </a>
                </div>
            </nav>

            <nav class="navbar navbar-expand-lg navbar-dark navbar-full" style="background-color:rgb(104, 170, 5)">
                <div class="mx-auto d-sm-flex d-block flex-sm-nowrap">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample11"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse text-center" id="navbarsExample11">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="btn btn-success mr-3" href="index.php" role="button">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success mr-3" href="FruitAndVegetables.php" role="button">Fruit and Vegetables</a>
                            </li>
                                <a class="btn btn-success mr-3" href="Meat.php" role="button">Meat</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success mr-3" href="Dairy.php" role="button">Dairy</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success mr-3" href="Pantry.php" role="button">Bread and Pantry</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success mr-3" href="Drinks.php" role="button">Beverages</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success mr-3" href="Organic.php" role="button">Organic</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="whitespace"></div>
        <div class="title">
            <h2>Dairy</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="product media">
                        <a href = "Milk.php">
                            <img src="Images/QuebonMilk.png" class="mr-5 media-list-image img-fluid" alt="Quebon 2% M.F. Milk">
                        </a>
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">
                                <a class="product-title" href="Milk.php">Quebon 2% M.F. Partially Skimmed Milk</a>
                            </h5>
                            <p>4L</p>
                            <p name = milkPrice data-price = "6.25">Price: $6.25</p>
                            <p>Select Quantity:</p>
                            
                            <form class="add-to-cart" action="Cart.php" method="post">
                                <input class = "product-quantity ml-2 mr-2" type = "number" name = "quantity" id = "milkQuantity" placeholder="1" onchange="saveQuantity('milkQuantity'); updateItemPrice('milk');">
                                <input type="hidden" name="productid" value="milk">
                                <input class="add-to-cart-submit" id= "milk" type = "image" name = "ToCart"  src = "Images/AddToCart.png" alt="Submit Form"/>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="product media">
                        <a href = "Creme.php">
                            <img src="Images/Creme.png" class="mr-5 media-list-image img-fluid" alt="Coffee Cream">
                        </a>
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">
                                <a class="product-title" href="Creme.php">Quebon 10% M.F. Coffee Creme</a>
                            </h5>
                            <p>1L</p>
                            <p name = creamPrice data-price = "2.25">Price: $2.25</p>
                            <p>Select Quantity:</p>
                            <form class="add-to-cart" action="Cart.php" method="post">
                                <input class="product-quantity ml-2 mr-2" type="number" name="quantity" id = "creamQuantity" onchange="saveQuantity('creamQuantity'); updateItemPrice('cream');" value="creamQuantity"
                                    placeholder="1" />
                                <input type="hidden" name="productid" value="creme">
                                <input class="add-to-cart-submit" id= "creme" type="image" name="ToCart" src="Images/AddToCart.png"
                                    alt="Submit Form" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="product media" style = "padding-bottom: 30px;">
                        <a href = "Butter.php">
                            <img src="Images/SaltedButter.png" width=270px class="mr-5 media-list-image img-fluid" alt="Lactantia Salted Butter">
                        </a>
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">
                                <a class="product-title" href="Butter.php">Lactantia Salted Butter</a>
                            </h5>
                            <p>454g</p>
                            <p name = butterPrice data-price = "3.25">Price: $3.25</p>
                            <p>Select Quantity:</p>
                            <form  class="add-to-cart" action="Cart.php" method="post">
                                <input class = "product-quantity ml-2 mr-2" type = "number" name = "quantity" id = "butterQuantity" onchange="saveQuantity('butterQuantity'); updateItemPrice('butter');" placeholder="1"/>
                                <input type="hidden" name="productid" value="butter">
                                <input class="add-to-cart-submit" id= "butter" type = "image" name = "ToCart"  src = "Images/AddToCart.png" alt="Submit Form"/>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="product media">
                        <a href = "ShreddedCheese.php">
                            <img src="Images/KraftCheddar.png" class="mr-5 media-list-image img-fluid" alt="Kraft Shredded Mild Cheddar Cheese">
                        </a>
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">
                                <a class="product-title" href="ShreddedCheese.php">Kraft Shredded Mild Cheddar Cheese</a>
                            </h5>
                            <p>226g</p>
                            <p name = cheesePrice data-price = "4.50">Price: $4.50</p>
                            <p>Select Quantity:</p>
                            <form class="add-to-cart" action="Cart.php" method="post">
                                <input class="product-quantity ml-2 mr-2" type="number" name="quantity" id = "cheeseQuantity" onchange="saveQuantity('cheeseQuantity'); updateItemPrice('cheese');" placeholder="1" />
                                <input type="hidden" name="productid" value="cheese">
                                <input class="add-to-cart-submit" type="image" name="ToCart" src="Images/AddToCart.png"
                                    alt="Submit Form" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="greyspace"></div>
        </div>
        <div class="whitespace1"></div>
        <div class="whitespace2"></div>
            
            <footer>
                <a href="index.php"><img src="Images/FruitCartLogo.png" class="logo mr-2" alt="FRESHFAMILY"></a>
                <span class="navbar-icon-label name">FRESHFAMILY MARKET</span>
            </footer>
        <script type = "text/javascript" src = "JavaScript/DianaProducts.js"></script>
   
    </body>
    </html>
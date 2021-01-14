<!DOCTYPE html>
    <html>
        <head>
            <title>Fruit and Vegetables</title>
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

        <body onload="loadAisleQuantity('avocadoQuantity', 'eggplantQuantity', 'strawberriesQuantity', 'zucchiniQuantity');
         loadPackageType('avocadoQuantityType'); displayAvocadoPriceOnload(); updateItemPrice('eggplant'); updateItemPrice('zucchini'); updateItemPrice('strawberries');">

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
            <h2>Fruits and Vegetables</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="product media">
                        <a href = "avocado.php">
                            <img src="Images/Avocado.png" class="mr-5 media-list-image img-fluid" alt="Avocado">
                        </a>
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">
                                <a class="product-title" href="avocado.php">Avocado</a>
                            </h5>
                            <p>Weight: varies</p>
                            <p name = avocadoPrice data-price = "2.50">Price: $1.49 each</p>
                            <p>Select Quantity:</p>
                            <form class="add-to-cart" action="Cart.php" method="post">
                                <input class="product-quantity ml-2 mr-2" type="number" name="quantity" id = "avocadoQuantity" onchange="saveQuantity('avocadoQuantity'); updateItemPrice('avocado');" value="avocadoQuantity"
                                    placeholder="1" />
                                <input type="hidden" name="productid" value="avocado">
                                <input class="add-to-cart-submit" type="image" name="ToCart" src="Images/AddToCart.png"
                                    alt="Submit Form" />
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="product media">
                        <a href = "Eggplant.php">
                            <img src="Images/Eggplant.png" class="mr-5 media-list-image img-fluid" alt="California Eggplant">
                        </a>
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">
                                <a class="product-title" href="Eggplant.php">California Eggplant</a>
                            </h5>
                            <p>1 unit</p>
                            <p name = eggplantPrice data-price = "2.50">Price: $2.50 each</p>
                            <p>Select Quantity:</p>
                            <form class="add-to-cart" action="Cart.php" method="post">
                                <input class="product-quantity ml-2 mr-2" type="number" name="quantity" id = "eggplantQuantity" onchange="saveQuantity('eggplantQuantity'); updateItemPrice('eggplant');" value="eggplantQuantity"
                                    placeholder="1" />
                                <input type="hidden" name="productid" value="eggplant">
                                <input class="add-to-cart-submit" type="image" name="ToCart" src="Images/AddToCart.png"
                                    alt="Submit Form" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="product media">
                        <a href = "Strawberries.php">
                            <img src="Images/Strawberries.png" class="mr-5 media-list-image img-fluid" alt="Strawberries">
                        </a>
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">
                                <a class="product-title" href="Strawberries.php">Strawberries</a>
                            </h5>
                            <p>400g</p>
                            <p name = strawberriesPrice data-price = "4.00">Price: $4.00 per pack</p>
                            <p>Select Quantity:</p>
                            <form class="add-to-cart" action="Cart.php" method="post">
                                <input class = "product-quantity ml-2 mr-2" type = "number" name = "quantity" id = "strawberriesQuantity" onchange="saveQuantity('strawberriesQuantity'); updateItemPrice('strawberries');" placeholder="1"/>
                                <input type="hidden" name="productid" value="strawberries">
                                <input class="add-to-cart-submit" type = "image" name = "ToCart"  src = "Images/AddToCart.png" alt="Submit Form"/>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="product media">
                        <a href = "Zucchini.php">
                            <img src="Images/Zucchini.png" class="mr-5 media-list-image img-fluid" alt="Zucchini">
                        </a>
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">
                                <a class="product-title" href="Zucchini.php">Zucchini</a>
                            </h5>
                            <p>1 unit</p>
                            <p name = zucchiniPrice data-price = "0.75">Price: $0.75 each</p>
                            <p>Select Quantity:</p>
                            <form class="add-to-cart" action="Cart.php" method="post">
                                <input class="product-quantity ml-2 mr-2" type="number" name="quantity" id = "zucchiniQuantity" onchange="saveQuantity('zucchiniQuantity'); updateItemPrice('zucchini');" value="creamQuantity"
                                    placeholder="1" />
                                    <input type="hidden" name="productid" value="zucchini">
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
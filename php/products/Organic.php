<!DOCTYPE html>
    <html>
        <head>
            <title>Organic Products</title>
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

        <body onload="document.getElementById('edamameQuantity').value = getSavedValue('edamameQuantity');
        document.getElementById('kaleQuantity').value = getSavedValue('kaleQuantity');
        document.getElementById('kuguaQuantity').value = getSavedValue('kuguaQuantity');"> 

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
                <h2>Organic Products</h2>
            </div>
    
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="product media">
                            <a href = "Edamame.php">
                                <img src="Images/edamame.png" class="mr-5 media-list-image img-fluid" alt="Edamame">
                            </a>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">
                                    <a class="product-title" href="Edamame.php">Organic Edamame</a>
                                </h5>
                                <p>Weight: 600g</p>
                                <p>Price: $2.99</p>
                                <p>Select Quantity:</p>
                                <form class="add-to-cart" action="Cart.php" method="post">
                                    <input class = "product-quantity ml-2 mr-2" type = "number" name = "quantity" id="edamameQuantity" onchange="saveValue(this)" placeholder="1"/>
                                    <input type="hidden" name="productid" value="edamame">
                                    <input class="add-to-cart-submit" type = "image" name = "ToCart"  src = "Images/AddToCart.png" alt="Submit Form"/>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="product media">
                            <a href = "Kugua.php">
                                <img src="Images/kugua.png" class="mr-5 media-list-image img-fluid" alt="Bitter Melon" >
                            </a>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">
                                    <a class="product-title" href="Kugua.php">Organic Bitter Melon</a>
                                </h5>
                                <p>Weight: approx. 250g</p>
                                <p>Price: $2.49</p>
                                <p>Select Quantity:</p>
                                <form class="add-to-cart" action="Cart.php" method="post">
                                    <input class="product-quantity ml-2 mr-2" type="number" name="quantity" id="kuguaQuantity" onchange="saveValue(this)"
                                        placeholder="1" />
                                        <input type="hidden" name="productid" value="melon">
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
                            <a href = "Kale.php">
                                <img src="Images/kale.png" width = 270px class="mr-5 media-list-image img-fluid" alt="Kale">
                            </a>
                            <div class="media-body">
                                <h5 class="mt-0 mb-1">
                                    <a class="product-title" href="Kale.php">Organic Kale, one bunch</a>
                                </h5>
                                <p>Weight: approx 300g</p>
                                <p>Price: $2.99</p>
                                <p>Select Quantity:</p>
                                <form class="add-to-cart" action="Cart.php" method="post">
                                    <input class = "product-quantity ml-2 mr-2" type = "number" name = "quantity" id="kaleQuantity" onchange="saveValue(this)" placeholder="1"/>
                                    <input type="hidden" name="productid" value="kale">
                                    <input class="add-to-cart-submit" type = "image" name = "ToCart"  src = "Images/AddToCart.png" alt="Submit Form"/>
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
            <script type = "text/javascript" src = "JavaScript/AntoineProducts.js"></script>
        </body>
    </html>
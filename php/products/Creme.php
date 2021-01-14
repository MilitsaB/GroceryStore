<!DOCTYPE html>
    <html>
        <head>
            <title>Quebon 10% Coffee Cream</title>
            <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
                integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
            <link rel = "stylesheet" type = "text/CSS" href = "StyleCSS.css">
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
            <link rel="icon" href="Images/FruitCartLogo.png">
        </head>

        <body onload = "loadQuantity('creamQuantity'); updateItemPrice('cream')">

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

            <div class="media product" style="margin-top: 0; margin-left: 5%">
                <img src="Images/Creme.png" class="media-list-image mr-3" alt="Quebon 10% Coffee Cream">
                <div class="media-body">
                    <div class="textblack" style="color: black">
                  <h5 class="mt-0">Quebon 10% Coffee Cream</h5>
                    <p>1L</p>
                    <p name = creamPrice data-price = "2.25">Price: $2.25</p>
                    <p>
                        <button class="btn green-button" type="button" onclick="openCollapse()">
                            More Description
                        </button>
                    </p>
                    <div class="mr-5" id="collapse" style = "display: none; max-height: 0; overflow:hidden; transition: max-height 0.35s ease-out">
                        <div class="card card-body">
                            <h6>Product Number</h6>
                            <p>544-389-66</p>
                            <h6>Description</h6>
                            <p>Quebon 10% M.F. Coffee Cream is a locally produced dairy product with a smooth texture that enhances coffee or used for cooking </p>
                            <h6>Ingredients</h6>
                            <p>Milk, cream, vitamin D3, mono- and siglycerides, disodium phosphare, sodium citrate, carrageenan</p>
                            <h6>Caution</h6>
                            <p>Contains lactose</p>
                            <h6>Storage</h6>
                            <p>Refrigerate after opening. Refer to Best Before date on package</p>
                        </div>
                    </div>
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
            <div class="whitespace2"></div>
            
            <footer>
                <a href="index.php"><img src="Images/FruitCartLogo.png" class="logo mr-2" alt="FRESHFAMILY"></a>
                <span class="navbar-icon-label name">FRESHFAMILY MARKET</span>
            </footer>
            <script type = "text/javascript" src = "JavaScript/DianaProducts.js"></script>
        </body>
    </html>
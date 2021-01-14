<?php
    session_start();
    if (!isset($_SESSION['admin']) || $_SESSION['admin'] == "" || $_SESSION['admin'] != 1)  {
        header('location: index.php');
    }
?>
    <html>
        <head>
            <Title>Edit Product</Title>
            <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
                integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
            <link rel = "stylesheet" type = "text/CSS" href = "StyleCSS.css">
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
                crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
                integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
                crossorigin="anonymous"></script>
                <link rel="icon" href="Images/FruitCartLogo.png">
        </head>

        <body>
            <nav class="logo-bar navbar navbar-expand-lg navbar-light justify-content-between">
                <a class="navbar-brand" href = "index.php">
                    <img class="main-logo" src = "Images/FruitCartLogo.png">
                    <span class="navbar-icon-label">FRESHFAMILY MARKET</span>
                </a>
                <div class="navbar-right">
                    <a href = "SignIn.php">
                        <img class = "icons" src = "Images/SignInIconOnly.png">
                        <span class="navbar-icon-label">Sign Out</span>
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
                                <a class="btn btn-success mr-3" href="#" role="button">Home</a>
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
            
            <div class = "back-end-nav-title">
                <nav id = "back-end-nav">
                    <a href="userlist.php">User List</a>
                    <a href="productlist.php">Product List</a>
                    <a href="orderlist.php">Order List</a>
                </nav>

                <div class = "back-end-title">
                    <h1>EDIT PRODUCT</h1>
                </div>
            </div>

            <div class = "back-end-title-alt">
                <h1>EDIT PRODUCT</h1>
            </div>
            <div class = "sign-in sign-up edit-user">
                <p>Add or Edit Product</p>
            <form >

            <div class="account-personal-info">
                <div id = "account">
                    <label for="category">Product Category</label>
                    <select id="category" name="category">
                        <option value="vegetables">Fruits and Vegetables</option>
                        <option value="meat">Meat Products</option>
                        <option value="dairy">Dairy Products</option>
                        <option value="pantry">Bread and Pantry</option>
                        <option value="drinks">Beverages</option>
                        <option value="organic">Organic Products</option>
                    </select><br><br>
                <label for="prodname">Product Name</label>
                <input type="text" id="prodname" name="prodname"><br><br>
                <label for="prodnumber">Product Number</label>
                <input type="text" id="prodnumber" name="prodnumber"><br><br>

                <label for="inventory">Current Inventory</label>
                <input type="number" id="inventory" name="inventory" min="0"><br><br>
            </div>
            <div id = "personal-info">
                <label for="description">Product Description</label>
                <textarea id="description" name="description"></textarea><br><br>
                <label for="ingredients">Product Ingredients</label>
                <textarea id="ingredients" name="ingredients"></textarea><br><br>
                <label for="storage">Storage Instructions</label>
                <textarea id="storage" name="storage"></textarea><br><br>
                <label for="image">Upload an image:</label>
                <input type="file" id="image" name="image" accept="image/*"><br><br>
                </div>
            </div>
            <div class = "centered-submit">
                <input id = "submit-changes" class = "btn red-button" type = "submit" value = "SUBMIT CHANGES">
            </div>
        </form>
    </div>
    <div class="whitespace2"></div>


                <footer>
                    <img src="Images/FruitCartLogo.png" class="logo mr-2" alt="FRESHFAMILY">
                    <span class="navbar-icon-label name">FRESHFAMILY MARKET</span>
                </footer>
        </body>

    </html>
<!DOCTYPE html>
<head>
    <title>FreshFamily Market</title>
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

<body>

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


    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="Images/fv.jpg" alt="First slide" >
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="Images/breads.jpg" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="Images/bbq.jpg" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

<h1 style=color:green;font-size:30pt;text-align:center;margin-top:3%>Welcome to FreshFamily Market</h1><br>
<h2 style=color:green;font-size:20pt;text-align:center>Family-owned since 1965</h2><br>
<p class=greeting1>
    Please select one of the aisles below to begin filling your cart for our quick and easy grocery delivery service
</p>
<div class="links1">
    
    <div class="container1">
        <a href="FruitAndVegetables.php">
        <img src="Images/vegetables.jpg" alt="Fruits and Vegetables" class="image1">
            <div class="middle1">
                <div class="text1">Fruits and Vegetables</div>
            </div>
        </a>
    </div>
    <div class="container1">
        <a href="Dairy.php">
        <img src="Images/dairy.jpg" alt="Dairy Products" class="image1">
            <div class="middle1">
                <div class="text1">Dairy Products</div>
            </div>
        </a>
    </div>

    <div class="container1">
        <a href="Meat.php">
        <img src="Images/meat.jpg" alt="Meat Products" class="image1">
            <div class="middle1">
                <div class="text1">Meat Products</div>
            </div>
        </a>
    </div>
</div>
<div class="links1">   
    <div class="container1">
        <a href="Pantry.php">
        <img src="Images/pantry.jpg" alt="Bread and Pantry" class="image1">
            <div class="middle1">
                <div class="text1">Bread and Pantry</div>
            </div>
        </a>
    </div>

    <div class="container1">
        <a href="Drinks.php">
        <img src="Images/beverage.jpg" alt="Beverages" class="image1">
            <div class="middle1">
                <div class="text1">Beverages</div>
            </div>
        </a>
    </div>

    <div class="container1" width="25%">
        <a href="Organic.php">
        <img src="Images/organic.jpg" alt="Organic Products" class="image1">
            <div class="middle1">
                <div class="text1">Organic Products</div>
            </div>
        </a>
    </div>  
</div>
<div class="whitespace1"></div>
            
<footer>
    <a href="index.php"><img src="Images/FruitCartLogo.png" class="logo mr-2" alt="FRESHFAMILY"></a>
    <span class="navbar-icon-label name">FRESHFAMILY MARKET</span>
</footer>
</body>
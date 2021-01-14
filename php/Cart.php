<?php
session_start();


    if (!isset($_SESSION)) {
        session_start();
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_SESSION['postdata'] = $_POST;
        unset($_POST);
        header("Location: ".$_SERVER[REQUEST_URI]);
        exit;
        }
        
        if (@$_SESSION['postdata']){
        $_POST=$_SESSION['postdata'];
        unset($_SESSION['postdata']);
        }

        if(isset($_POST['array'])){
            $backendcart = unserialize($_POST['array']);
          $_SESSION['cart'] = $backendcart;
          
        }

       

    $xml1=simplexml_load_file("products.xml") or die("Error: Cannot create object");
    $assocArr = array();

    if( isset($_POST['productid']) )
{
    if(empty($_SESSION['cart'])) 
    {
        $_SESSION['cart'] = array();   
    } 

     foreach($xml1->item as $item){ 
        
        if ($item->id == $_POST['productid'] )
        {
           $obj = array('id' => (string)$item->id,'name' => (string)$item->name, 'price' => (string)$item->cost,'quantity' => $_POST['quantity'], 'image' => (string)$item->image);
           $id = trim($item->id);
           $_SESSION['cart'][$id] = $obj;
          
        }
        
    }
}

if( isset($_POST['cart']))
{
   
 $arr = json_decode($_POST['cart']);
 foreach($arr as $key => $value){
       $assocArr[$value->id] = $value;   
 }
 $_SESSION['cart'] = $assocArr;
 }

   $indexedArray = array();
   foreach($_SESSION['cart'] as $obj){
    array_push($indexedArray,$obj);
   }

?>
<!DOCTYPE html>
<html>

<form class="add-to-cart" action="cart.php" method="post">
                               
    <input type="hidden"  id= "output" value = "<?php $_SESSION['cart']?>">
                       
</form>
<head>
    <title>Shopping Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/CSS" href="StyleCSS.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
        crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="JavaScript/cartscript.js" async></script>
        <script>
            var obj = JSON.parse('<?php echo json_encode($indexedArray); ?>');
            console.log(obj);
        </script>
    <link rel="icon" href="Images/FruitCartLogo.png">
</head>

<body>

    <nav class="logo-bar navbar navbar-expand-lg navbar-light justify-content-between">
        <a class="navbar-brand" href="index.php">
            <img class="main-logo" src="Images/FruitCartLogo.png">
            <span class="navbar-icon-label">FRESHFAMILY MARKET</span>
        </a>
        <div class="navbar-right">
            <a href="Cart.php">
                <img class="icons" src="Images/AddToCart.png">
                <span class="navbar-icon-label mr-4">My Cart</span>
            </a>
            <a href="SignIn.php">
                <img class="icons" src="Images/SignInIconOnly.png">
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


<div class="container2 content-section">
    <a class="btn btn-dark btn-continue"  href="index.php" type="cartbutton">Continue Shopping</a>
    <h2 class="cart-header" style = "font-size: 1.6em;margin-bottom: 35px;margin-top: 10px;">SHOPPING CART</h2>
    <div class="cart-row">
        <span class="cart-item cart-header cart-column">Items</span>
        <span class="cart-price cart-header cart-column" style="color:rgb(62, 102, 2)">Price</span>
        <span class="cart-quantity cart-header cart-column">Quantity</span>
    </div>
    
    <div class="cart-items">
        <div id= "productcart"></div>
       
    <div class="cart-subtotal" style="justify-content: space-between;">
   
        <span class="summary">
            <span class="cart-summary-title">Order Summary</span>
        </span>
        <span class="sub">
            <span class="cart-subtotal-title">Subtotal</span>
         <span class="cart-subtotal-price"></span>
        </span>
    </div>
    <div class="cart-taxes">
        <span class="cart-taxes-title">QST</span>
        <span class="cart-taxesQST-price"></span>
    </div>
    <div class="cart-taxes">
        <span class="cart-taxes-title">GST</span>
        <span class="cart-taxesGST-price"></span>
    </div>
    <div class="cart-shipping">
        <span class="cart-shipping-title">Shipping</span>
        <span class="cart-shipping-price"></span>
    </div>
    <div class="cart-total">
        <span class="cart-total-title">Grand Total</span>
        <span class="cart-total-price"></span>
    </div>
    <form  action="" method="post">
    <div class ="purchasebutton">
    <button name ="btn1" class="btn btn-dark btn-purchase"  >PURCHASE</button>
    </div>
    </form>

    <?php

    if(isset($_POST['btn1'])){
       $xml = new DOMDocument("1.0", "UTF-8");
        $xml->load('order.xml');
       $main = json_encode($_SESSION['cart']);
     
        $username="User";
        $orderTag = $xml->createElement("order");
        $usernametag=$xml->createElement("username",$username);
        //variables
        $arr = $_SESSION['cart'];
        foreach($arr as $obj){
         $id=$obj->id;
         $productName = $obj->name;
         $price = $obj->price;
         $quantity = $obj->quantity;
         $image = $obj->image;
         
        $rootTag = $xml->getElementsByTagName("root")->item(0);
     
        $productNameTag = $xml->createElement("product");
            $idTag=$xml->createElement("id",$id);
            $nameTag=$xml->createElement("name",$productName);
            $quantityTag= $xml->createElement("quantity",$quantity);
            $priceTag =$xml->createElement("price",$price);
            $imageTag =$xml->createElement("image",$image);
     
            //append the data to the product name then append product name to the root
     
     
                //appending to the product Name
                $productNameTag->appendChild($idTag);
                $productNameTag->appendChild($nameTag);
                $productNameTag->appendChild($quantityTag);
                $productNameTag->appendChild($priceTag);
                $productNameTag->appendChild($imageTag);
     
                $orderTag->appendChild($productNameTag);
    }
     
        $orderTag->appendChild($usernametag);
        $rootTag->appendChild($orderTag);
        $xml->formatoutput = true;
        $xml->save('order.xml');
     
        echo"<script type='text/javascript'>alert('Purchase Completed');</script>";
     
    
    }
   
    ?>
 
</div>
</div>

</body>
<footer>
     <a href="index.php"><img src="Images/FruitCartLogo.png" class="logo mr-2" alt="FRESHFAMILY"></a>
     <span class="navbar-icon-label name">FRESHFAMILY MARKET</span>
</footer>
</html>
 

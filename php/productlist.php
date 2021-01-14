<?php
    session_start();
    if (!isset($_SESSION['admin']) || $_SESSION['admin'] == "" || $_SESSION['admin'] != 1)  {
        header('location: index.php');
    }
    $xml1=simplexml_load_file("productList.xml") or die("Error: Cannot create object");
    $obj = array();
    $itemArr = array();
    $productArr = array();
  

    

  
    foreach($xml1->item as $item){
      $obj = array('category' => (string)$item->category,'productname' => (string)$item->productname,'productnumber' => (string)$item->productnumber, 'inventory' => (string)$item->inventory,'description'=> (string)$item->description,'ingredients'=> (string)$item->ingredients,'storage'=> (string)$item->storage,'image'=> (string)$item->image);
      $itemArr = $obj;
      array_push($productArr, $itemArr);
      $itemArr= array();
  
  }
  
  

$position=0;
 /* foreach ( $productArr as $product ) {

    echo '<dl style="margin-bottom: 1em;">';
  
    foreach ( $product as $key => $value ) {
      echo "<dt>$key</dt><dd>$value</dd>";
    }
  
    echo '</dl>';
  }*/
  
?>
<html>

<head>
    <Title>Product List</Title>
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
    <link rel="icon" href="Images/FruitCartLogo.png">
</head>


<body>
    <nav class="logo-bar navbar navbar-expand-lg navbar-light justify-content-between">
        <a class="navbar-brand" href="index.php">
            <img class="main-logo" src="Images/FruitCartLogo.png">
            <span class="navbar-icon-label">FRESHFAMILY MARKET</span>
        </a>
        <div class="navbar-right">
            <a href="SignIn.php">
                <img class="icons" src="Images/SignInIconOnly.png">
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
                        <a class="btn btn-success mr-3" href="index.php" role="button">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success mr-3" href="FruitAndVegetables.php" role="button">Fruit and
                            Vegetables</a>
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

    <div class="back-end-nav-title">
        <nav id="back-end-nav">
            <a href="userlist.php">User List</a>
            <a href="productlist.php">Product List</a>
            <a href="orderlist.php">Order List</a>
        </nav>

        <div class="back-end-title">
            <h1>PRODUCT LIST</h1>
        </div>
    </div>


    <div class="back-end-title-alt">
        <h1>PRODUCT LIST</h1>
    </div>

    <div class="whitespace1"></div>
    <h4>Fruits and Vegetables</h4>
    <div class="container-fluid user-list">
        <div class="row user-table-title">
            <div class="col-sm-1">Product Name</div>
            <div class="col-sm-5">Product Number</div>
            <div class="col-sm-2">Inventory</div>


        </div>
        <?php
        $section="fruitsandvegetables";
        foreach($productArr as $innerArray){
            $cat = $innerArray["category"];
                if ($section==$cat){
            
            echo
            '<div class="row user-row">
            <div class="col-sm-1">'.$innerArray['productname'].'</a></div>
            <div class="col-sm-5">'.$innerArray['productnumber'].'</div>
            <div class="col-sm-2">'.$innerArray['inventory'].'</div>
            <div class="col-sm-2">
                <a href="productedit.php"><input class="btn red-button" type="button" value="Edit"></a>
                <input class="btn red-button" type="button" value="Delete">
            </div>
        </div>';
        }}
        ?>
        
    </div>
    <div class="whitespace1"></div>
    <h4>Meat</h4>
    <div class="container-fluid user-list">
        <div class="row user-table-title">
            <div class="col-sm-1">Product Name</div>
            <div class="col-sm-5">Product Number</div>
            <div class="col-sm-2">Inventory</div>


        </div>
        <?php
        $section="meat";
        foreach($productArr as $innerArray){
            $cat = $innerArray["category"];
                if ($section==$cat){
            
            echo
            '<div class="row user-row">
            <div class="col-sm-1">'.$innerArray['productname'].'</a></div>
            <div class="col-sm-5">'.$innerArray['productnumber'].'</div>
            <div class="col-sm-2">'.$innerArray['inventory'].'</div>
            <div class="col-sm-2">
                <a href="productedit.php"><input class="btn red-button" type="button" value="Edit"></a>
                <input class="btn red-button" type="button" value="Delete">
            </div>
        </div>';
        }}
        ?>
        
    </div>
    <div class="whitespace1"></div>
    <h4>Dairy</h4>
    <div class="container-fluid user-list">
        <div class="row user-table-title">
            <div class="col-sm-1">Product Name</div>
            <div class="col-sm-5">Product Number</div>
            <div class="col-sm-2">Inventory</div>


        </div>
        <?php
        $section="dairy";
        foreach($productArr as $innerArray){
            $cat = $innerArray["category"];
                if ($section==$cat){
            
            echo
            '<div class="row user-row">
            <div class="col-sm-1">'.$innerArray['productname'].'</a></div>
            <div class="col-sm-5">'.$innerArray['productnumber'].'</div>
            <div class="col-sm-2">'.$innerArray['inventory'].'</div>
            <div class="col-sm-2">
                <a href="productedit.php"><input class="btn red-button" type="button" value="Edit"></a>
                <input class="btn red-button" type="button" value="Delete">
            </div>
        </div>';
        }}
        ?>
        
        </div>
        <div class="whitespace1"></div>
        <h4>Bread and Pantry</h4>
        <div class="container-fluid user-list">
            <div class="row user-table-title">
                <div class="col-sm-1">Product Name</div>
                <div class="col-sm-5">Product Number</div>
                <div class="col-sm-2">Inventory</div>
                </div>
                <?php
        $section="breadandpantry";
        foreach($productArr as $innerArray){
            $cat = $innerArray["category"];
                if ($section==$cat){
            
            echo
            '<div class="row user-row">
            <div class="col-sm-1">'.$innerArray['productname'].'</a></div>
            <div class="col-sm-5">'.$innerArray['productnumber'].'</div>
            <div class="col-sm-2">'.$innerArray['inventory'].'</div>
            <div class="col-sm-2">
                <a href="productedit.php"><input class="btn red-button" type="button" value="Edit"></a>
                <input class="btn red-button" type="button" value="Delete">
            </div>
        </div>';
        }}
        ?>



            <div class="whitespace1"></div>
            <h4>Beverages</h4>
            <div class="container-fluid user-list">
                <div class="row user-table-title">
                    <div class="col-sm-1">Product Name</div>
                    <div class="col-sm-5">Product Number</div>
                    <div class="col-sm-2">Inventory</div>


                </div>
                <?php
        $section="beverages";
        foreach($productArr as $innerArray){
            $position=array_search($innerArray,$productArr);
            $cat = $innerArray["category"];
                if ($section==$cat){
            
            echo
            '<div class="row user-row">
            <div class="col-sm-1">'.$innerArray['productname'].'</a></div>
            <div class="col-sm-5">'.$innerArray['productnumber'].'</div>
            <div class="col-sm-2">'.$innerArray['inventory'].'</div>
            <div class="col-sm-2">
                <a href="productedit.php"><input class="btn red-button" type="button" value="Edit"></a>
                <form method="post" style = "display: inline;">
                <input class="btn red-button" type = "submit" id="delete" type="button" value="Delete">
                <input type = "hidden" name = "deleteProduct" value ='.$innerArray['productname'].'>
                </form>
                '.$position.'
            </div>
        </div>';
        }}
        ?>
               
                </div>
                <div class="whitespace1"></div>
                <h4>Organic</h4>
                <div class="container-fluid user-list">
                    <div class="row user-table-title">
                        <div class="col-sm-1">Product Name</div>
                        <div class="col-sm-5">Product Number</div>
                        <div class="col-sm-2">Inventory</div>


                    </div>
                    <?php
        $section="organic";
        foreach($productArr as $innerArray){
            $position=array_search($innerArray,$productArr);
            $cat = $innerArray["category"];
                if ($section==$cat){
            
            echo
            '<div class="row user-row">
            <div class="col-sm-1">'.$innerArray['productname'].'</a></div>
            <div class="col-sm-5">'.$innerArray['productnumber'].'</div>
            <div class="col-sm-2">'.$innerArray['inventory'].'</div>
            <div class="col-sm-2">
            
                <a href="productedit.php"><input class="btn red-button" type="button" value="Edit"></a>
            <form method="post" style = "display: inline;">
                <input class="btn red-button" type = "submit" id="delete" type="button" value="Delete">
                <input type = "hidden" name = "deleteProduct" value ='.$position.'>
                </form>
                '.$position.'
            </div>
        </div>';
        }}
        ?>
                   
                </div>
                <a href="productadd.php">
                    <div class="center-button"><input class="btn red-button" type="button" value="Add a Product"></div>
                </a>
            </div>
        </div>
    </div>

                <div class="whitespace2"></div>
</body>
<?php


/*
    if (isset($_POST['deleteProduct'])){
        unset($productArr[$_POST['deleteProduct']]);

        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->load('productList.xml');
    
        $elements = $xml->getElementsByTagName('item');
        for ($i = $elements->length; --$i >= 0; ) {
            $href = $elements->item($i);
            $href->parentNode->removeChild($href);    
        }
    
        $rootTag = $xml->getElementsByTagName("root")->item(0);
    if(!empty($productArr)){
        $rootTag = $xml->getElementsByTagName("products")->item(0);
        foreach($productArr as $product){
            $itemTag = $xml->createElement("item");

                $category=$product['category'];
                $productname=$product['productname'];
                $productnumber = $product['productnumber'];
                $inventory = $product['inventory'];
                $description = $product['description'];
                $ingredients = $product['ingredients'];
                $storage = $product['storage'];
                $image = $product['image'];
       
                $itemNameTag = $xml->createElement("item");
                $categoryTag=$xml->createElement("category",$category);
                $productnameTag=$xml->createElement("productname",$productname);
                $productnumberTag=$xml->createElement("productnumber",$productnumber);
                $inventoryTag= $xml->createElement("inventory",$inventory);
                $descriptionTag =$xml->createElement("description",$description);
                $ingredientsTag =$xml->createElement("ingredients",$ingredients);
                $storageTag =$xml->createElement("storage",$storage);
                $imageTag =$xml->createElement("image",$image);

                $itemNameTag->appendChild($categoryTag);
                $itemNameTag->appendChild($productnameTag);
                $itemNameTag->appendChild($productnumberTag);
                $itemNameTag->appendChild($inventoryTag);
                $itemNameTag->appendChild($descriptionTag);
                $itemNameTag->appendChild($ingredientsTag);
                $itemNameTag->appendChild($storageTag);
                $itemNameTag->appendChild($imageTag);

                $itemTag->appendChild($itemNameTag);
            }
            $rootTag->appendChild($itemNameTag);
            $xml->formatoutput = true;
            file_put_contents("productList.xml", $xml->saveXML());
           
            
        } 
      
    }
*/
?>

<footer>
    <a href="index.php"><img src="Images/FruitCartLogo.png" class="logo mr-2" alt="FRESHFAMILY"></a>
    <span class="navbar-icon-label name">FRESHFAMILY MARKET</span>
</footer>

</html>
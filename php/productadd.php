<?php     session_start();
    if (!isset($_SESSION['admin']) || $_SESSION['admin'] == "" || $_SESSION['admin'] != 1)  {
        header('location: index.php');
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


  $xml1=simplexml_load_file("productList.xml") or die("Error: Cannot create object");
  $obj = array();
  $itemArr = array();
  $productArr = array();


  foreach($xml1->products as $things){
    $obj = array('category' => (string)$item->category,'productname' => (string)$item->productname,'productnumber' => (string)$item->productnumber, 'inventory' => (string)$item->inventory,'description'=> (string)$item->description,'ingredients'=> (string)$item->ingredients,'storage'=> (string)$item->storage,'image'=> (string)$item->image);
    $itemArr = $obj;
    array_push($productArr, $itemArr);
    $itemArr= array();

}
$_SESSION['productlist'] =$productArr;

$newItem = array();  
$newItem= $_SESSION['newItem'];

/**if (isset($_POST['btn1'])){
    $i = 0;
        foreach($addedorder as $obj){
            if ( ($_POST['deleteItem']) == $obj['id'] ){
                unset($addedorder[$i]);
            }
            $i++;
        }
        $_SESSION['addedcart']= array();
        foreach($addedorder as $obj){
            array_push($_SESSION['addedcart'],$obj);
        }
        $addedorder= $_SESSION['addedcart'];
       
     }  
**/
?>
<!DOCTYPE html>
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
                <a class="navbar-brand" href = "index.html">
                    <img class="main-logo" src = "Images/FruitCartLogo.png">
                    <span class="navbar-icon-label">FRESHFAMILY MARKET</span>
                </a>
                <div class="navbar-right">
                    <a href = "SignIn.html">
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
                                <a class="btn btn-success mr-3" href="FruitAndVegetables.html" role="button">Fruit and Vegetables</a>
                            </li>
                                <a class="btn btn-success mr-3" href="Meat.html" role="button">Meat</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success mr-3" href="Dairy.html" role="button">Dairy</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success mr-3" href="Pantry.html" role="button">Bread and Pantry</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success mr-3" href="Drinks.html" role="button">Beverages</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success mr-3" href="Organic.html" role="button">Organic</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <div class = "back-end-nav-title">
                <nav id = "back-end-nav">
                    <a href="userlist.html">User List</a>
                    <a href="productlist.html">Product List</a>
                    <a href="orderlist.html">Order List</a>
                </nav>

                <div class = "back-end-title">
                    <h1>ADD PRODUCT</h1>
                </div>
            </div>

            <div class = "back-end-title-alt">
                <h1>ADD PRODUCT</h1>
            </div>
            <div class = "sign-in sign-up edit-user">
                <p>Add Product</p>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <div class="account-personal-info">
                <div id = "account">
                    <label for="category">Product Category</label>
                    <select id="category" name="category" value="<?php echo $category;?>">
                        <option value="fruitsandvegetables">Fruits and Vegetables</option>
                        <option value="meat">Meat Products</option>
                        <option value="dairy">Dairy Products</option>
                        <option value="breadandpantry">Bread and Pantry</option>
                        <option value="drinks">Beverages</option>
                        <option value="organic">Organic Products</option>
                    </select><br><br>
                <label for="productname">Product Name</label>
                <input type="text" id="productname" name="productname" value="<?php if(isset($productname))echo $productname;?>"><br><br>
                <label for="productnumber">Product Number</label>
                <input type="text" id="productnumber" name="productnumber" value="<?php if(isset($productnumber))echo $productnumber;?>"><br><br>

                <label for="inventory">Current Inventory</label>
                <input type="number" id="inventory" name="inventory" value="<?php if(isset($inventory))echo $inventory;?>"><br><br>
            </div>
            <div id = "personal-info">
                <label for="description">Product Description</label>
                <textarea id="description" name="description" value="<?php if(isset($description))echo $description;?>"></textarea><br><br>
                <label for="ingredients">Product Ingredients</label>
                <textarea id="ingredients" name="ingredients" value="<?php if(isset($ingredients))echo $ingredients;?>"></textarea><br><br>
                <label for="storage">Storage Instructions</label>
                <textarea id="storage" name="storage" value="<?php if(isset($storage))echo $storage;?>"></textarea><br><br>
                <label for="image">Upload an image:</label>
                <input type="file" id="fileToUpload" name="fileToUpload" accept="image/*"><br><br>
                </div>
            </div>
            <div class = "centered-submit">
                <input id = "submit-changes" class = "btn red-button" type = "submit" value = "SUBMIT CHANGES" name = "saveItem">
              
            </div>
        </form>
    </div>
    <?php
            $category = $productname = $productnumber = $inventory = $description = $ingredients = $storage = $image = "";

                if (isset($_POST["category"]) && $_POST["category"]!="" && isset($_POST["productname"]) && $_POST["productname"]!="" && isset($_POST["productnumber"]) && $_POST["productnumber"]!="" 
                && isset($_POST["inventory"]) && $_POST["inventory"]!="" && isset($_POST["description"]) && $_POST["description"]!="" && isset($_POST["ingredients"]) && $_POST["ingredients"]!=""  
                && isset($_POST["storage"]) && $_POST["storage"]!="")
                {
                    
                    $category = $_POST["category"];
                    $productname = $_POST["productname"];
                    $productnumber= $_POST["productnumber"];
                    $inventory = $_POST["inventory"];
                    $description= $_POST["description"];
                    $ingredients = $_POST["ingredients"];
                    $storage = $_POST["storage"];
                    if (isset($_POST["image"])){
                     $image = $_POST["image"];}
                     else {$image="noimage";}


                    $newThing = array();
                    $newThing = array('category' => $category,'productname' => $productname,'productnumber' => $productnumber, 'inventory' => $inventory,'description'=> $description,'ingredients'=> $ingredients,'storage'=> $storage,'image'=> $image);
                    array_push($productArr, $newThing);
 
                    $xml = new DOMDocument("1.0", "UTF-8");
                    $xml->load('productList.xml');
            /*
                    $elements = $xml->getElementsByTagName('item');
                    for ($i = $elements->length; --$i >= 0; ) {
                        $href = $elements->item($i);
                        $href->parentNode->removeChild($href);    
                    }
                
                    $username="User";
                    
                    $usernametag=$xml->createElement("username",$username);
                */        
                    $rootTag = $xml->getElementsByTagName("products")->item(0);
            
                    foreach($productArr as $itemArr){
                        $itemTag = $xml->createElement("item");
            
                            $category=$itemArr['category'];
                            $productname=$itemArr['productname'];
                            $productnumber=$itemArr['productnumber'];
                            $inventory=$itemArr['inventory'];
                            $description=$itemArr['description'];
                            $ingredients=$itemArr['ingredients'];
                            $storage=$itemArr['storage'];
                            $image=$itemArr['image'];
                            
                            


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
                
            
         ?>
    <div class="whitespace2"></div>


                <footer>
                    <img src="Images/FruitCartLogo.png" class="logo mr-2" alt="FRESHFAMILY">
                    <span class="navbar-icon-label name">FRESHFAMILY MARKET</span>
                </footer>
        </body>

    </html>
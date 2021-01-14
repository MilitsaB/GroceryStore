<?php
    session_start();
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

        $xml1=simplexml_load_file("order.xml") or die("Error: Cannot create object");
        $obj = array();
        $itemArr = array();
        $itemA = array();
        $productArr = array();
        $orderArr = array();
    
        foreach($xml1->order as $item){
            foreach($item->product as $product){
            $obj = array('id' => (string)$product->id,'name' => (string)$product->name, 'price' => (string)$product->price,'quantity'=> (string)$product->quantity);
            $itemArr = $obj;
            array_push($itemA, $itemArr);
            $itemArr= array();
        }
        array_push($productArr, $itemA);
        $itemA = array();
        }
        array_push($orderArr,$productArr);
        
        $_SESSION['fullcart'] =$orderArr;

    $xml2=simplexml_load_file("products.xml") or die("Error: Cannot create object");
    
    if( isset($_POST['categories']) )
{
    if(empty( $_SESSION['addedcart'])) 
    {
        $_SESSION['addedcart']= array();   
    }

     foreach($xml2->item as $item){ 
        
        if ($item->name == $_POST['categories'] )
        {
           $obj = array('id' => (string)$item->id,'name' => (string)$item->name, 'price' => (string)$item->cost,'quantity' => $_POST['quantity'], 'image' => (string)$item->image);
           $id = trim($item->id);
           array_push($_SESSION['addedcart'],$obj);
           
        }
        
     }
}
$addedorder = array();  
$addedorder= $_SESSION['addedcart'];

if (isset($_POST['btn1'])){
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

?>
    <html>
        <head>
            <Title>Edit Order</Title>
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
            
            <div class = "back-end-nav-title">
                <nav id = "back-end-nav">
                    <a href="userlist.php">User List</a>
                    <a href="productlist.php">Product List</a>
                    <a href="orderlist.php">Order List</a>
                </nav>

                <div class = "back-end-title">
                    <h1>ADD ORDER</h1>
                </div>
            </div>

            <div class = "back-end-title-alt">
                <h1>ADD ORDER</h1>
            </div>

            <div class = "sign-in sign-up edit-user">
                <h2>ADD ORDER</h2>
            
                <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark" >
                      <tr>
                        <th scope="col" style="background-color: #990000;">#</th>
                        <th scope="col" style="background-color: #990000;">Item</th>
                        <th scope="col" style="background-color: #990000;">Quantity</th>
                        <th scope="col" style="background-color: #990000;"></th>
                        <th scope="col" style="background-color: #990000;"></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(!empty( $addedorder)) {
                        $i = 0;
                        $arrayCount=0;
                        foreach($addedorder as $obj){
                            $value=$obj['quantity'];
                            $i++;
                        echo '
                        <tr>
                        <th scope="row">'.$i.'</th>
                        <td>'.$obj['name'].'</td>
                        <td>
                        <form method="post" action='.$_SERVER['PHP_SELF'].'>
                        <button name="incqty" style="border-radius: 5px;background-color: #bf4040; border-color: #bf4040; color: white">+</button>
                        <input class="backendorder" type="text" size="2" name="item" value="'.$value.'" style="display: inline;margin-left: 8px;">
                        <input type ="hidden" name = "index" value ='.$arrayCount.'>
                        <button name="decqty" style="border-radius: 5px;background-color: #bf4040; border-color: #bf4040; color: white">-</button>
                        </td>
                        <form method="post" style = "display: inline;">
                        <td><button name ="btn1" class="btn btn-danger" type="cartbutton">X</button></td>
                         <input type = "hidden" name = "deleteItem" value ='.$obj['id'].'>
                         </button>
                         </form>
                      </tr>';
                      $arrayCount++;}
                    }?>

                <?php
                       
                       if(isset($_POST['incqty'])){
                           $addedorder[$_POST['index']]['quantity']++;
                           $_SESSION['addedcart']=$addedorder;
                           echo'<script>
                           window.location.href = document.URL;
                           </script>';
                       }

                       if(isset($_POST['decqty'])){
                        $addedorder[$_POST['index']]['quantity']--;
                           $_SESSION['addedcart']=$addedorder;
                           echo'<script>
                           window.location.href = document.URL;
                           </script>';
                       }
                       ?>
                     
                    </tbody>

                    </tbody>
                  </table>
                </div> 

                
                <form method="post" style = "display: inline;">
                    <div class = "centered-submit">
                        <input id = "submit-changes" class = "btn red-button" type = "submit" value = "SAVE">
                        <input type = "hidden" name = "saveOrder">
                    </div>
                </form>
                </form>
            </div>

            <?php
            
              if (isset($_POST['saveOrder'])){
                 array_push($_SESSION['fullcart'][0],$addedorder);
                $orderArr =$_SESSION['fullcart'];
             
 
                    $xml = new DOMDocument("1.0", "UTF-8");
                    $xml->load('order.xml');
            
                    $elements = $xml->getElementsByTagName('order');
                    for ($i = $elements->length; --$i >= 0; ) {
                        $href = $elements->item($i);
                        $href->parentNode->removeChild($href);    
                    }
                
                    $username="User";
                
                    $usernametag=$xml->createElement("username",$username);
                    $rootTag = $xml->getElementsByTagName("root")->item(0);
            
                    foreach($orderArr[0] as $order){
                        $orderTag = $xml->createElement("order");
            
                        foreach ($order as $product){
                            $id=$product['id'];
                            $productName = $product['name'];
                            $price = $product['price'];
                            $quantity = $product['quantity'];
                            $image = $product['image'];
                
                            $productNameTag = $xml->createElement("product");
                            $idTag=$xml->createElement("id",$id);
                            $nameTag=$xml->createElement("name",$productName);
                            $quantityTag= $xml->createElement("quantity",$quantity);
                            $priceTag =$xml->createElement("price",$price);
                            $imageTag =$xml->createElement("price",$image);
            
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
                    }    
                }
         ?>

            <div class = "sign-in sign-up edit-user">
            <h4 style="text-align:center">Add Item</h4>
                                    <form method = "post">
                                        <div class="account-personal-info">
                                    <div id = "account">
                                        <label for="Item">Item</label>
                                        <select name = "categories" id="categories">
                                            <option>Select Product</option>
                                            <optgroup label="Fruits and Vegetables">
                                            <option id=avocado>Avocado</option>
                                            <option id=eggplant>California Eggplant</option>
                                            <option id=strawberries>Strawberries</option>
                                            <option id=zucchini>Zucchini</option>
                                            </optgroup>
                                            <optgroup label="Meat">
                                            <option id=chicken>Chicken Thighs</option>
                                            <option id=beek>Lean Ground Beef</option>
                                            <option id=sausage>Italian Sausages</option>
                                            <option id=bacon>Sliced Bacon</option>
                                            </optgroup>
                                            <optgroup label="Dairy">
                                            <option id=milk>Quebon 2% Milk</option>
                                            <option id=creme>Quebon 10% Coffee Creme</option>
                                            <option id=butter>Salted Butter</option>
                                            <option id=cheese>Kraft Cheddar Cheese</option>
                                            </optgroup>
                                            <optgroup label="Pantry">
                                            <option id=baguette>Baked Baguette</option>
                                            <option id=croissants>Croissants</option>
                                            <option id=cookies>Chocolate Chip Cookies</option>
                                            </optgroup>
                                            <optgroup label="Beverages">
                                            <option id=water>Eska Water</option>
                                            <option id=juice>Orange Juice</option>
                                            <option id=coca>Coca-Cola</option>
                                            <option id=beer>Coors Light Beer</option>
                                            </optgroup>
                                            <optgroup label="Organic">
                                            <option id=edamame>Edamame</option>
                                            <option id=melon>Bitter Melon</option>
                                            <option id=kale>Kale</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div id = "quantity-info">
                                        
                                        <label for="itemQuantity">Quantity</label>
                                        <input type = "number" name = "quantity" id="quantity" min = '1'>
                                        
                                    </div>
                                </div>
                                <div class = "centered-submit">
                                    <input id = "submit-changes" class = "btn red-button" type = "submit" value = "ADD">
                                </div>
                            </form>
            
               
            </div>
            <div class="mt-3 spacing"></div>
            <form action = "Cart.php" method="post" style = "display: inline;">
            <a class = "left-button" style="margin-left: 65%;">
            <input class = "btn red-button" type = "submit" value = "BACK TO CART">
            <input type="hidden" name="array" value="<?php echo(htmlentities(serialize($addedorder))); ?>">
            </a>
            </form>
            <div class="whitespace2"></div>
            
            <footer>
                <a href="index.php"><img src="Images/FruitCartLogo.png" class="logo mr-2" alt="FRESHFAMILY"></a>
                <span class="navbar-icon-label name">FRESHFAMILY MARKET</span>
            </footer>
        </body>
    </html>
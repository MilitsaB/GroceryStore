<?php
    session_start();
    if (!isset($_SESSION['admin']) || $_SESSION['admin'] == "" || $_SESSION['admin'] != 1)  {
        header('location: index.php');
    }
    $admin = false;
    if (isset($_POST['email']) && $_POST['email'] != null)  {
        $email = $_POST['email'];
        if ($email == "admin@admin.com")  {
            $admin = true;
        }
        else {
            $file = fopen('users.txt','r');

            $n = 0;
            $arr;
            // Iterating through the lines
            while (!feof($file))  {
                $line = fgets($file);
                $arr[$n] = $line;
                $data = explode(";",$line);
                if (trim($data[0])==$email){
                    $arr[$n] = null;
                }
                else {
                    $n = $n+1;
                }
                if ($line == "")  {
                    break;
                }
            }

            fclose($file);

            if ($arr[sizeof($arr)-1] == "")  {
                unset($arr[sizeof($arr)-1]);
                $arr[sizeof($arr)-1] = rtrim($arr[sizeof($arr)-1]);
            }

            // Rewriting file
            $file = fopen('users.txt','w');

            foreach($arr as $value)  {
                if ($value != "") {
                    fputs($file,$value);
                }
            }
            fclose($file);
        }
    }

?>
    <html>
        <head>
            <Title>User List</Title>
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
            <?php
                if ($admin)  {
                    echo '<h2>Cannot delete main admin!</h2>';
                }
            ?>
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
                    <h1>USER LIST</h1>
                </div>
            </div>

            <div class = "back-end-title-alt">
                <h1>USER LIST</h1>
            </div>

            <div class = "container-fluid user-list">
                <div class = "row user-table-title">
                    <div class = "col-sm-1">TYPE</div>
                    <div class = "col-sm-4">E-MAIL (ID)</div>
                    <div class = "col-sm-2">NAME</div>
                    <div class = "col-sm-1">LOCATION</div>
                    <div class = "col-sm-4">ACTION</div>
                </div>
                <?php
                    // reading file
                    $file = fopen('users.txt', 'r');
                    
                    // Iterating through the lines
                    while (!feof($file))  {
                        $line = fgets($file);
                        // Stopping empty line reached
                        if ($line == "")  {
                            break;
                        }
                        $data = explode(";",$line);
                        
                        // Printing out main admin entry
                        if ($data[0] == "admin@admin.com")  {
                            echo 
                            '<div class = "row user-row">
                                <div class = "col-sm-1">'.$data[10].'</div>
                                <div class = "col-sm-4">'.$data[0].'</div>
                                <div class = "col-sm-2">'.$data[2]." ".$data[3].'</div>
                                <div class = "col-sm-1">'.$data[6].", ".$data[7].'</div>
                                <div class = "col-sm-4">
                                <form action = "edituser.php" method = "post" style = "display: inline;">        
                                    <input class = "btn red-button" type = "submit" value = "More Details / Edit">
                                    <input type = "hidden" name = "email" value = '.$data[0].'>
                                    <input type = "hidden" name = "action" value = "edit">
                                </form>
                                </div>
                            </div>';
                        }
                        else {
                            // Printing out all other users
                            echo 
                            '<div class = "row user-row">
                                <div class = "col-sm-1">'.$data[10].'</div>
                                <div class = "col-sm-4">'.$data[0].'</div>
                                <div class = "col-sm-2">'.$data[2]." ".$data[3].'</div>
                                <div class = "col-sm-1">'.$data[6].", ".$data[7].'</div>
                                <div class = "col-sm-4">
                                <form action = "edituser.php" method = "post" style = "display: inline;">
                                    <input class = "btn red-button" type = "submit" value = "More Details / Edit">
                                    <input type = "hidden" name = "email" value = '.$data[0].'>
                                    <input type = "hidden" name = "action" value = "edit">
                                </form>
                                <form method="post" style = "display: inline;">
                                    <input class = "btn red-button" type = "submit" value = "Delete">
                                    <input type = "hidden" name = "email" value = '.$data[0].'>
                                </form>
                                </div>
                            </div>';
                        }
                    }


                ?>
            </div>

            <a href="edituser.php" class = "center-button"><input class = "btn red-button" type = "button" value = "Add User"></a>
            
            <div class="whitespace2"></div>
            
            <footer>
                <a href="index.php"><img src="Images/FruitCartLogo.png" class="logo mr-2" alt="FRESHFAMILY"></a>
                <span class="name navbar-icon-label">FRESHFAMILY MARKET</span>
            </footer>
        </body>
    </html>


            
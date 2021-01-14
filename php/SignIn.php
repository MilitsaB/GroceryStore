<?php
    // Initializing booleans used to print messages
    $emptyField = false;
    $emailNotFound = true;
    $noMatchPasswords = false;
    $loginMessage = false;
    
    // If one of the fields is empty
    if (!isset($_POST["email"]) || $_POST["email"]== "" || !isset($_POST["password"]) || $_POST["password"]== "") {
        $emptyField = true;
    }

    // If fields have been filled
    else {

        // Setting input to vars for convenience
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Reading user file
        $file = fopen("users.txt", "r");
        $admin = false;
        

        while (!feof($file))  {
            $line = fgets($file);
            $data = explode(";", $line);

            // If the e-mail is a match
            if (trim($data[0]) == $email)  {
                $emailNotFound = false;

                // If passwords are the same
                if (trim($data[1])== $password)  {
                    session_start();
                    
                    // If admin
                    if (trim($data[10]) == "admin")  {
                        $loginMessage = true;
                        $admin = true;
                        $_SESSION['user'] = $email;
                        $_SESSION['admin'] = $admin;
                        $_SESSION['firstName'] = $data[2];
                        header("refresh:5; URL=userlist.php");
                        break;
                    }

                    // If not admin
                    else {
                        $loginMessage = true;
                        $_SESSION['user'] = $email;
                        $_SESSION['admin'] = $admin;
                        $_SESSION['firstName'] = $data[2];
                        header("refresh:5; URL=index.php");
                        break;
                    }
                }
                // If passwords are not the same
                else  {
                    $noMatchPasswords = true;
                    break;
                } 
            }
            // If current e-mail isn't a match
            else  {
                continue;   
            }
        }
        fclose($file);
    }
?>
    <html>
        <head>
            <Title>Sign In</Title>
            <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
            integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
            <link rel = "stylesheet" type = "text/CSS" href = "StyleCSS.css">
            <link rel="icon" href="Images/FruitCartLogo.png">
        </head>
        <body>
            <?php 
                // Printing message if one of the fields is empty
                if ($emptyField)  {
                    echo '<h2>Please enter a valid E-mail address and password</h2>';
                }
                // Printing message if the entered e-mail cannot be found
                else if ($emailNotFound)  {
                    echo '<h2>No account found with this username. Please try again or click register for a new account</h2>';
                }
                // Printing message if the password does not match the username
                else if ($noMatchPasswords)  {
                    echo '<h2>Incorrect password. Please try again</h2>';
                }
                // Printing a message if login was successful
                else if ($loginMessage) {
                    echo '<h2>Welcome back, '.$data[2].'! Redirecting...</h2>';
                }
            ?>
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

            <div class = "sign-in">
                <h2 class = "sign-in-header">Sign In</h2>
                <form action = "" method = "post">
                    <p>E-mail</p>
                    <input type = "text" name = "email" id = "email">    
                    <p>Password<p>
                    <input type = "password" name = "password" id = "psw">
                    <br>
                    <input onclick = "logIn()" type = "submit" id = "log-in">
                    <button type = "button" onclick="location.href = 'RecoverPassword.html';">Forgot Password</button>
                    <p>New here? <a href = "SignUp.php">Click here to sign up</a></p> 
                    <script type = "text/javascript"  src = "JavaScript/registration.js"></script>
                </form>
            </div>
            
            <footer>
                <a href="index.php"><img src="Images/FruitCartLogo.png" class="logo mr-2" alt="FRESHFAMILY"></a>
                <span class="navbar-icon-label name">FRESHFAMILY MARKET</span>
            </footer>
        </body>
    </html>
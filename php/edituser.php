<?php
    session_start();
    if (!isset($_SESSION['admin']) || $_SESSION['admin'] == "" || $_SESSION['admin'] != 1)  {
        header('location: index.php');
    }
    else {
        // Boooleans for message display
        $invalidEmail = false;
        $invalidPassword = false;
        $invalidPostalCode = false;
        $invalidPhone = false;
        $exists = false;
        $registered = false;
        $emptyFields = false;
        $submitted = false;

        // Retrieving data if the action is edit
        if (isset($_POST['email']) && $_POST['email'] != null && $_POST['action'] == "edit")  {
            $email = $_POST['email'];
            $mainAdmin = false;
            
            if ($email == "admin@admin.com")  {
                $mainAdmin = true;
            }
            
            $file = fopen('users.txt','r');
            $n = 0;
            $userData;
            $arr;
            // Iterating through the lines
            while (!feof($file))  {
                $line = fgets($file);
                $data = explode(";",$line);
                $arr[$n] = $data;
                if (trim($data[0])==$email){
                    break;
                }
            }

            fclose($file);
            
        }
        // If user submits changes
        else if (isset($_POST["email"]) && $_POST["email"]!="" && isset($_POST["password"]) && $_POST["password"]!="" && isset($_POST["confirmPassword"]) && $_POST["confirmPassword"]!="" 
        && isset($_POST["firstName"]) && $_POST["firstName"]!="" && isset($_POST["lastName"]) && $_POST["lastName"]!="" && isset($_POST["address"]) && $_POST["address"]!=""  
        && isset($_POST["city"]) && $_POST["city"]!="" && isset($_POST["province"]) && $_POST["province"]!="" && isset($_POST["postalCode"]) && $_POST["postalCode"]!="" 
        && isset($_POST["phone"]) && $_POST["phone"]!="" && isset($_POST["user-type"]) && $_POST["user-type"]!="" && $_POST['action'] == "edited")  {

            $file = fopen('users.txt','r');
            $n = 0;
            $userData;
            $arr;
            $found = false;
            // Iterating through the users
            while (!feof($file))  {
                $line = fgets($file);
                $data = explode(";",$line);
                if ($line == "") {
                    break;
                }
                // If user found, changing 
                if (trim($data[0])==$_POST['originalEmail']){
                    $found = true;
                    $data[0] = $_POST['email'];
                    $data[1] = $_POST['password'];
                    $data[2] = $_POST['firstName'];
                    $data[3] = $_POST['lastName'];
                    $data[4] = $_POST['address'];
                    $data[5] = $_POST['apartment'];
                    $data[6] = $_POST['city'];
                    $data[7] = $_POST['province'];
                    $data[8] = $_POST['postalCode'];
                    $data[9] = $_POST['phone'];
                    $data[10] = $_POST['user-type'];
                }
                // writing $data into an array and incrementing line count
                $arr[$n] = $data;
                $n = $n + 1;
            }
            fclose($file);

            // Rewriting file with new data
            $file = fopen('users.txt', 'w');

            $count = 0;
            foreach($arr as $value)  {
                if($count == 0) {
                    $str = $value[0].";".$value[1].";".$value[2].";".$value[3].";".$value[4].";"
                    .$value[5].";".$value[6].";".$value[7].";".$value[8].";".$value[9].";".trim($value[10]);
                }
                else {
                    $str = "\r\n".$value[0].";".$value[1].";".$value[2].";".$value[3].";".$value[4].";"
                    .$value[5].";".$value[6].";".$value[7].";".$value[8].";".$value[9].";".trim($value[10]);
                }
                fputs($file,$str);
                $count = $count + 1;
                //echo print_r($value);
            }
            $submitted = true;
            header("refresh:5; URL=userlist.php");

            fclose($file);

        }


        // Adding user
        elseif (isset($_POST["email"]) && $_POST["email"]!="" && isset($_POST["password"]) && $_POST["password"]!="" && isset($_POST["confirmPassword"]) && $_POST["confirmPassword"]!="" 
        && isset($_POST["firstName"]) && $_POST["firstName"]!="" && isset($_POST["lastName"]) && $_POST["lastName"]!="" && isset($_POST["address"]) && $_POST["address"]!=""  
        && isset($_POST["city"]) && $_POST["city"]!="" && isset($_POST["province"]) && $_POST["province"]!="" && isset($_POST["postalCode"]) && $_POST["postalCode"]!="" 
        && isset($_POST["phone"]) && $_POST["phone"]!="" && isset($_POST["user-type"]) && $_POST["user-type"]!="" &&  $_POST['action'] == "added" )
        {
            // Assigning filled fields to variables for convenience
            $email = $_POST["email"];
            $password = $_POST["password"];
            $password2 = $_POST["confirmPassword"];
            $first = $_POST["firstName"];
            $last = $_POST["lastName"];
            $address = $_POST["address"];
            $city = $_POST["city"];
            $postalCode = $_POST["postalCode"];
            $phone = $_POST["phone"];
            $userType = $_POST["user-type"];
            
            // Regex for valid inputs        
            $validPassword = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
            $validPostalCode = '/^[ABCEGHJKLMNPRSTVXY]{1}\d{1}[A-Z]{1} *\d{1}[A-Z]{1}\d{1}$/';
            $validPhone = '/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/';
        
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $invalidEmail = true;
            }
            // Checking if passwords match
            elseif ($password!=$password2 || !preg_match($validPassword, $password)) {
                $invalidPassword = true;
            }
            // Checking for invalid postal code
            elseif (!preg_match($validPostalCode, $postalCode)) {
                $invalidPostalCode = true;
            }
            // Checking if phone number is valid
            elseif (!preg_match($validPhone, $phone))  {
                $invalidPhone = true;
            }
            // If all fields are valid
            else {
            
                // check for existing user
                $file=fopen("users.txt","r");
                while(!feof($file))
                {
                    $line = fgets($file);
                    $array = explode(";",$line);
                    if(trim($array[0]) == $_POST['email'])
                    {
                        $exists=true;
                        break;
                    }
                }
                fclose($file);
    
                // Register
                if(!$exists) {
                    $file = fopen("users.txt", "a+");
                    fputs($file,"\r\n".$_POST["email"].";".$_POST["password"].";".$_POST["firstName"].";".$_POST["lastName"].";".$_POST["address"].";"
                    .$_POST["apartment"].";".$_POST["city"].";".$_POST["province"].";".$_POST["postalCode"].";".$_POST["phone"].";".$_POST['user-type']);
                    fclose($file);
                    $registered = true;
                    header("refresh:5; URL=userlist.php");      
                }
            }
        }
        else  {
            $emptyFields = true;
        }
        
    }
?>
    <html>
        <head>
            <Title>EDIT USER</Title>
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
                    // Message if fields are empty
                    if ($emptyFields)  {
                        echo '<h2>Please fill all mandatory fields.</h2>';
                    }
                    // Message if the entered e-mail is invalid
                    elseif ($invalidEmail)  {
                        echo '<h2> Invalid e-mail address. Please enter a valid e-mail address. </h2>';
                    }
                    // Message if the entered password is invalid
                    elseif ($invalidPassword)  {
                        echo '<h2>Invalid password or passwords not matching. Please re-enter your password</h2>';
                    }
                    // Message if the entered postal code is invalid
                    elseif ($invalidPostalCode)  {
                        echo '<h2> Invalid postal code. Postal code must be in upper case with no spaces. E.g. H1X2Y3. Please try again</h2>';
                    }
                    // Message if the entered phone number is invalid
                    elseif ($invalidPhone)  {
                        echo '<h2>Invalid phone number. Please enter a number in a 000-000-0000 format</h2>';
                    }
                    // Message if the user already exists
                    elseif ($exists)  {
                        echo '<h2> This e-mail address is already registered. Please log in or register using a different e-mail address.</h3>';
                    }
                    // Message if the user has been registered
                    elseif ($registered)  {
                        echo '<h2>'.$_POST['email'].' has been successfully added. Redirecting...</h2>';
                    }
                    // Message if changes were submitted
                    elseif ($submitted)   {
                        echo '<h2>Your changes have been saved. Redirecting...</h2>';
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
                    <h1>ADD/EDIT USER</h1>
                </div>
            </div>

            <div class = "back-end-title-alt">
                <h1>ADD/EDIT USER</h1>
            </div>

            <div class = "sign-in sign-up edit-user">

                        <?php
                            // Filling in the data fields with user info if action = edit
                            if (isset($_POST['email']) && $_POST['email'] != null && $_POST['action'] == "edit") {
                                echo '
                                <h2>EDIT USER</h2>
                                <form method = "post">
                                    <div class="account-personal-info">
                                        <div id = "account">
                                            <h4>Account <br>Information</h4>
                                            <label for="e-mail">E-mail Address</label>
                                            ';
                                            if ($_POST['email'] == "admin@admin.com") {
                                            echo '<input disabled type = "text" name = "email" id = "e-mail" value = "'.$data[0].'">';
                                            }
                                            else {
                                                echo '<input type = "text" name = "email" id = "e-mail" value = "'.$data[0].'">';
                                            }
                                            echo '
                                            <label for="password">Password</label>
                                            <div class = "comment">*must contain at least 8 characters one of which is a number</div>
                                            <input type = "text" name = "password" id = "password" value = "'.$data[1].'" >
                                            <label for="confirmPassword">Confirm Password</label>
                                            <input type = "text" name = "confirmPassword" id = "confirm-password" value = "'.$data[1].'">
                                            <label for = "user-type">Account Permissions</laber>
                                            ';
                                            if ($mainAdmin) { echo
                                                '<select name = "user-type" class = "">
                                                    <option disabled value = "user">User</option>
                                                    <option value = "admin">Admin</option>
                                                </select>';
                                            }
                                            else { echo
                                                '<select name = "user-type" class = "">
                                                    <option value = "user">User</option>
                                                    <option value = "admin">Admin</option>
                                                </select>';
                                            }
                                    echo '
                                    </div>
                                    <div id = "personal-info">
                                        <h4>Personal <br>Information</h4>
                                        <label for="first-name">First Name</label>
                                        <input type = "text" name = "firstName" id="first-name" value = "'.$data[2].'" >
                                        <label for="last-name">Last Name</label>
                                        <input type = "text" name = "lastName" id="last-name" value = "'.$data[3].'" >
                                        <label for="street-address">Street Address (eg. 218 York Avenue)</label>
                                        <input type = "text" name = "address" id="address" value = "'.$data[4].'">
                                        <label for="apartment">Apartment</label>
                                        <input type = "number" name = "apartment" id="apartment" placeholder = "(Optional)" value = "'.$data[5].'">
                                        <label for="city">City</label>
                                        <input type = "text" name = "city" id="city" value = "'.$data[6].'">
                                        <label for="province">Province</label>
                                        <select name = "province" id="province" value = "'.$data[7].'">
                                            <option disabled>Select Province</option>
                                            <option selected>Quebec</option>
                                            <option>Ontario</option>
                                            <option>Prince Edward\'s Island</option>
                                            <option>Manitoba</option>
                                            <option>Alberta</option>
                                            <option>Saskachewan</option>
                                            <option>British Columbia</option>
                                            <option>Newfoundland and Labrador</option>
                                            <option>Northwest Territories</option>
                                            <option>Nova Scotia</option>
                                            <option>New Brownswick</option>
                                            <option>Yukon</option>
                                            <option>Nunavut</option>
                                        </select>
                                        <label for="postal-code">Postal Code</label>
                                        <input type = "text" name = "postalCode" id="postalCode" value = "'.$data[8].'">
                                        <label for="phone-number">Phone Number</label>
                                        <input type = "text" name = "phone" id = "phone" value = "'.$data[9].'">
                                        <input type = "hidden" name = "action" value = "edited">
                                        <input type = "hidden" name = "originalEmail" value = "'.$data[0].'">
                                        </div>
                                    </div>
                                    <div class = "centered-submit">
                                        <input id = "submit-changes" class = "btn red-button" type = "submit" value = "SUBMIT CHANGES">
                                    </div>
                                </form>';
                            }
                            // Displaying empty form if add
                            else {
                                echo '
                                    <h2>ADD USER</h2>
                                    <form method = "post">
                                        <div class="account-personal-info">
                                    <div id = "account">
                                        <h4>Account <br>Information</h4>
                                        <label for="e-mail">E-mail Address</label>
                                        <input type = "text" name = "email" id = "e-mail">
                                        <label for="password">Password</label>
                                        <div class = "comment">*must contain at least 8 characters one of which is a number</div>
                                        <input type = "text" name = "password" id = "password">
                                        <label for="confirmPassword">Confirm Password</label>
                                        <input type = "text" name = "confirmPassword" id = "confirm-password">
                                        <laber for = "user-type">Account Permissions</laber>
                                        <select name = "user-type" class = "">
                                            <option value = "user">User</option>
                                            <option value = "admin">Admin</option>
                                        </select>
                                    </div>
                                    <div id = "personal-info">
                                        <h4>Personal <br>Information</h4>
                                        <label for="first-name">First Name</label>
                                        <input type = "text" name = "firstName" id="first-name">
                                        <label for="last-name">Last Name</label>
                                        <input type = "text" name = "lastName" id="last-name">
                                        <label for="street-address">Street Address (eg. 218 York Avenue)</label>
                                        <input type = "text" name = "address" id="street-address">
                                        <label for="apartment">Apartment</label>
                                        <input type = "number" name = "apartment" id="apartment" placeholder = "(Optional)">
                                        <label for="city">City</label>
                                        <input type = "text" name = "city" id="city" >
                                        <label for="province">Province</label>
                                        <select name = "province" id="province">
                                            <option disabled>Select Province</option>
                                            <option selected>Quebec</option>
                                            <option>Ontario</option>
                                            <option>Prince Edward\'s Island</option>
                                            <option>Manitoba</option>
                                            <option>Alberta</option>
                                            <option>Saskachewan</option>
                                            <option>British Columbia</option>
                                            <option>Newfoundland and Labrador</option>
                                            <option>Northwest Territories</option>
                                            <option>Nova Scotia</option>
                                            <option>New Brownswick</option>
                                            <option>Yukon</option>
                                            <option>Nunavut</option>
                                        </select>
                                        <label for="postal-code">Postal Code</label>
                                        <input type = "text" name = "postalCode" id="postal-code" placeholder = "e.g. H1HT2Y">
                                        <label for="phone-number">Phone Number</label>
                                        <input type = "text" name = "phone" id = "phone-number" placeholder = "e.g. 514-000-0000">
                                        <input type = "hidden" name = "action" value = "added">
                                    </div>
                                </div>
                                <div class = "centered-submit">
                                    <input id = "submit-changes" class = "btn red-button" type = "submit" value = "SUBMIT">
                                </div>
                            </form>';
                            }
                        ?>
            </div>
            <div class="whitespace2"></div>
            
            <footer>
                <a href="index.php"><img src="Images/FruitCartLogo.png" class="logo mr-2" alt="FRESHFAMILY"></a>
                <span class="navbar-icon-label name">FRESHFAMILY MARKET</span>
            </footer>
        </body>
    </html>


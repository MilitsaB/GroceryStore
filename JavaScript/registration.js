
    // Validates that the user did not leave any mandatory fields blank
function logIn()  {
    var username = document.getElementById("email");
    var password = document.getElementById("psw");

    if (username.value == "")  {
        alert("Please enter a username");
        username.focus();
    }
    if (password.value == "")  {
        alert("please enter a password");
        password.focus();
    }
}

    // Validates that the user did not leave any mandatory fields blank
function register()  {
    var username = document.getElementById("email");
    var password = document.getElementById("psw");
    var confirmPassword = document.getElementById("confirm-password");
    var firstName = document.getElementById("first-name");
    var lastName = document.getElementById("last-name");
    var address = document.getElementById("street-address");
    var apt = document.getElementById("apartment");
    var city = document.getElementById("city");
    var province = document.getElementById("province").value;
    var postal = document.getElementById("postal-code");
    var phone = document.getElementById("phone-number");


    if (username.value == "")  {
        alert("Please enter a valid e-mail address");
        confirmPassword.focus();
    }
    else if (password.value == "")  {
        alert("please enter a password");
        password.focus();
    }
    else if (confirmPassword.value == "")  {
        alert("Please enter a second password");
        confirmPassword.focus();
    }
    else if (firstName.value == "")  {
        alert("please enter your first name");
        firstName.focus();
    }
    else if (lastName.value == "")  {
        alert("Please enter your last name");
        lastName.focus();
    }
    else if (address.value == "")  {
        alert("please enter an address in the address line");
        address.focus();
    }
    else if (city.value == "")  {
        alert("Please enter your city");
        city.focus();
    }
    else if (province == "Select Province") {
        alert("Please select a province");
        province.focus();
    }
    else if (postal.value == "")  {
        alert("please enter your postal code");
        postal.focus();
    }
    else if (phone.value == "")  {
        alert("Please enter a phone number");
        phone.focus();
    }
    else {
        alert("A verification e-mail has been sent. Please check your inbox to finish your registration");
    }
}

// Pattern matching for password
function validPassword1()  {
    
    var valid = /^(?=.*\d).{8,15}$/;
    var password = document.getElementById("psw");

    if (!password.value.match(valid))  {
        alert("Password must be 8 to 15 characters long and must contain at least one digit");
        password.focus();
    }
}

// Checks that the two passwords are the same
function validPassword2()  {
    
    var password = document.getElementById("psw");
    var confirmPassword = document.getElementById("confirm-password");
    
    if (password.value != confirmPassword.value) {
        alert("The two passwords entered are not the same. Please re-enter both passwords.");
        password.focus();
    }
}

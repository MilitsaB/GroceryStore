//~~~~~~~//
// PRICE //
//~~~~~~~//

// Initializing product prices
var avocadoSingle = 1.49;
var avocado6pack = 6.99;
var avocadoTotalPrice;

// AVOCADO //

//Displaying price
function displayAvocadoPriceOnload()  {

    updateAvocadoPrice();
    if (avocadoTotalPrice != null)
        document.getElementsByName("avocadoPrice")[0].innerHTML = "Price: $" + avocadoTotalPrice;
    else 
        document.getElementsByName("avocadoPrice")[0].innerHTML = "Price: $" + avocadoSingle;
}

// updating total price for avocado
function updateAvocadoPrice()  {
    var quantity = window.sessionStorage.getItem("avocadoQuantity");
    if (isNaN(quantity) || quantity <= 0) {
        quantity = 1
        document.getElementById("avocadoQuantity").value = 1;
        window.sessionStorage.setItem("avocadoQuantity", 1);
    }
    if (window.sessionStorage.getItem("avocadoQuantityType") == "SingleUnit")
        avocadoTotalPrice = avocadoSingle * quantity;
    if (window.sessionStorage.getItem("avocadoQuantityType") == "6pack")
        avocadoTotalPrice = avocado6pack * quantity;
}

// OTHER PRODUCTS //

// updating item price
function updateItemPrice(item)  {
        var priceElem = document.getElementsByName(item + "Price")[0];
        var price = priceElem.dataset.price;
        var quantity = window.sessionStorage.getItem(item + "Quantity");
        if (isNaN(quantity) || quantity <= 0) {
            quantity = 1
            document.getElementById(item + "Quantity").value = 1;
            window.sessionStorage.setItem(item + "Quantity", 1);
        }
        priceElem.innerHTML = "Price: $" + price*quantity;
    
}

// updating prices for all items in isle
function updateAislePrice(item1, item2, item3, item4)   {
    updateItemPrice(item1);
    updateItemPrice(item2);
    updateItemPrice(item3);
    updateItemPrice(item4);
}


//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
// SAVING AND STORING PRODUCT TYPE AND QUANTITY //
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//

// loading a product quantity from session storage
function loadQuantity(id)  {
    document.getElementById(id).value = window.sessionStorage.getItem(id);
}

// calling loadQuantity of all aisle products upon reloading page
function loadAisleQuantity(a, b, c, d) {

    loadQuantity(a);
    loadQuantity(b);
    loadQuantity(c);
    loadQuantity(d);
}


// Saving session changes in quantity
function saveQuantity(id)  {
    var quantity = document.getElementById(id).value;
    window.sessionStorage.setItem(id, quantity);
}

// Saving session choices for package type
function savePackageType(id, key)  {
    var packageType = document.getElementById(id).value;
    window.sessionStorage.setItem(key, packageType);
}

 // Loading a package type from session storage
function loadPackageType(key) {
    if (window.sessionStorage.getItem(key) == "SingleUnit")  
        document.getElementById("SingleUnit").checked=true;
    if (window.sessionStorage.getItem(key) == "6pack")
        document.getElementById("6pack").checked=true;
}

//~~~~~~~~~~~~~~~~~~~~~~~~~//
// MORE DESCRIPTION BUTTON //
//~~~~~~~~~~~~~~~~~~~~~~~~~//
function openCollapse()  {
    var collapse = document.getElementById("collapse");
    if (collapse.style.display == "block")  {
        collapse.style.display = "none";
        collapse.style.maxHeight = 0;
    }
    else  {
        collapse.style.display = "block";
        collapse.style.maxHeight = collapse.scrollHeight + "px";
    }
}

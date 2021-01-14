document.getElementById("baguetteQuantity").value = getSavedValue("baguetteQuantity");
document.getElementById("croissantQuantity").value = getSavedValue("croissantQuantity");
document.getElementById("cookieQuantity").value = getSavedValue("cookieQuantity");
document.getElementById("baconQuantity").value = getSavedValue("baconQuantity");
document.getElementById("chickenQuantity").value = getSavedValue("chickenQuantity");
document.getElementById("sausageQuantity").value = getSavedValue("sausageQuantity");
document.getElementById("beefQuantity").value = getSavedValue("beefQuantity");
document.getElementById("edamameQuantity").value = getSavedValue("edamameQuantity");
document.getElementById("kaleQuantity").value = getSavedValue("kaleQuantity");
document.getElementById("kuguaQuantity").value = getSavedValue("kuguaQuantity");

function saveValue(v){
    var id = v.id;  
    var val = v.value;
    localStorage.setItem(id, val);
}
function getSavedValue(v){
    if (!localStorage.getItem(v)) {
        return "1"; 
        }
        else if (localStorage.getItem(v)<1){
            return "1";
        }

    return localStorage.getItem(v);
}
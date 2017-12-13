/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function addFunction(name, price, inventory) {

    var numItems = localStorage.getItem("numItems");

    for (var i = 0; i < numItems; i++) {
        var item = JSON.parse(localStorage.getItem(i));
        if (item.name === name) {
            item.inventory++;
            localStorage.setItem(i, JSON.stringify(item));
            return;
        }
    }

    var cart = new Item(name, price, inventory);
    localStorage.setItem(numItems, JSON.stringify(cart));
    
    numItems++;
    localStorage.setItem("numItems", numItems);

}

function deleteFunction(name) {


    var numItems = localStorage.getItem("numItems");

    for (var i = 0; i < numItems; i++) {
        var cart = JSON.parse(localStorage.getItem(i));


        if (cart !== null && cart.name === name && cart.inventory !== 0) {  
                cart.inventory--;
                localStorage.setItem(i, JSON.stringify(cart));
                
        }

        // if (cart !== null && cart.name === name && cart.inventory === "1" ){
        //     localStorage.removeItem(i);  

    }
}


function displayFunction() {
    var numItems = localStorage.getItem("numItems");
    for (var i = 0; i < numItems; i++) {

        var cart = JSON.parse(localStorage.getItem(i));
        for (var property in cart) {
            document.write(cart[property] + "</br>");
        }
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function Item(name, price, inventory) {  
    this.name = name;
    this.price = price;
    this.inventory = inventory;
}


Item.prototype.setName = function (name) {
   this.name = name;
};

Item.prototype.setPrice = function (price) {
   this.price = price;
};

Item.prototype.getName = function () {
   return this.name;
};

Item.prototype.getPrice = function () {
   return this.price;
};

Item.prototype.getInventory = function () {
   return this.inventory;
};

Item.prototype.display = function () {

    document.write("<div class = 'this.name' style = 'border: dotted pink 1px'>")
    document.write("<p class= " + this.name + ">" + "Product Name: " + this.name + "</p>");
    document.write("<p class= " + this.name + ">" + "Product Price: $ " + this.price + "</p>");
//    document.write("<p class= " + this.name + ">" + "Product Inventory: " + this.inventory + "</p>");
    document.write("<center><img src='" + this.name + ".jpg' width ='250px' height ='250px'></center>" + "</br>");

   
    document.write('<p><input id="clickMe" type="button" value="Add to Cart" onclick="addFunction(\'' + this.name + '\',\'' + this.price + '\',\'' + this.inventory + '\')" />');
    document.write('<input id="clickMe" type="button" value="Delete from Cart" onclick="deleteFunction(\''  + this.name + '\')" /></p>');
    document.write("</div>")
};

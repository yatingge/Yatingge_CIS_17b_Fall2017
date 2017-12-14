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
    
    var x = this.name;
    document.write("<div class = 'this.name' style = 'border: dotted pink 1px'>")
    document.write("<p class= " + this.name + ">" + "Product Name: " + this.name + "</p>");
    document.write("<p class= " + this.name + ">" + "Product Price: $ " + this.price + "</p>");
    document.write('<center><img src="' + this.name + '.jpg" width ="250px" height ="250px" onclick="redirectFunction(\''  + this.name + '\')"></center>' + "</br>");
    document.write("</div>"); 
   
};

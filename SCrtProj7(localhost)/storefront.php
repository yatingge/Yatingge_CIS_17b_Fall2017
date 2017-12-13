<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <title>Dolls from the Palace Museum </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript" src ="storefront.js"></script>
        <script type="text/javascript" src="cart.js"></script>
        <script type="text/javascript" src="cookieFunction.js"></script>
        <link rel="stylesheet" type="text/css" href="stylesheet.css" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>



</body>

<div class="fixed">
    <div><h1>Dolls from the Palace Museum</h1></div>
    <div><h1>Happy Fun Life</h1></div>
    <!-- <div><p><input type="button" onclick="displayFunction()"  value ="Go to Carts"></p></div> -->
</div>

<div>
    <p>Welcome! <span id="username"></span></p>
    <script> 
        var username = getCookie("username");
        document.getElementById("username").innerHTML = username;
    </script>
</div>
<button onclick="showCart()"><i class="fa fa-cart-plus" style="font-size:30px;color:red">GO!</i></button>
<button id="signout" onclick="signout()"><i class="fa fa-frown-o" style="font-size:20px;color:grey">Sign Out!</i></button>
<button id="signout" onclick="signin()"><i class="fa fa-smile-o" style="font-size:20px;color:grey">Sign In!</i></button>

<script type="text/javascript">
    function showCart(){
                    window.location.assign('cart.php');
                }

    function signout(){

        window.location.assign('Signout.php');

    }

    function signin(){
        window.location.assign('Login.php');
    }

</script>

<div class ="column">
    <script>

        // var url = document.location.href;
        // var url = url + "?userInput=" + $username;
        // var info = url.split("?");
        // var nameValuePairs = info[1].split("&");
        // var map = nameValuePairs[0].split("=");
        // var username = map[1];

        // localStorage.setItem("username", username);

        localStorage.setItem("numItems", 0);  


       
        var items = [
            new Item("cat dolls", 5.5, 1),
            new Item("generals dolls", 5.5, 1),
            new Item("fishing dolls", 4.5, 1),
            new Item("wedding dolls", 6.6, 1),
            new Item("servants dolls", 6.6, 1),
            new Item("guards dolls", 6.6, 1),
        ];

        var len = items.length;
        for (var i = 0; i < items.length; i++) {
            items[i].display();

        }

        function redirectFunction(name){
            var product = name;
            localStorage.setItem("product",product);
            window.location.assign('view.php');
            for (var i = 0; i < items.length; i++) {
                if(items[i].name == name){
                    var price = items[i].price;
                    setCookie("price",price);
                }
            }

        }


    </script>
</div>

</body>
</html>

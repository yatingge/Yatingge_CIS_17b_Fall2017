<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Login Page!</title>
        <script type="text/javascript" src="cookieFunction.js"></script>
        <script type="text/javascript" src="storefront.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style type="text/css">
        	body{
    			background-image:url("title.jpg");
    			background-repeat: no-repeat;
    			background-position: center top; 
    			background-size: 100% 20%;
			}

        	h1{
				text-align: center;
    			font-family: "Comic Sans MS", cursive, sans-serif;
    			font-size: 40px;
			}

			#img{

				border: gold 2px solid;
				top:100px;
				width:40%;
			}

			#description{
				border: gold 2px solid;
				left:100px;
				width:20%;
			}

			.column{
				column-count: 2;
			}

			p{
			text-align: left;
    		font-family: "Comic Sans MS", cursive, sans-serif;
    		font-size: 20px;
			}

        </style>


    </head>

    <?php

    if(isset($_COOKIE['username'])){
        $username = $_COOKIE["username"];
        setcookie("username", $username, time() + (86400 * 30));
        echo "<p>Welcome to Doll Store!". $username .'</p>';
    }else{
        echo "<p>Plese sign into your account for shopping!</p>";
    }


    ?>
       
    </head>

    <body>

    	<div class="fixed" >
    	<div><h1>Dolls from the Palace Museum</h1></div>
    	<div><h1>Happy Fun Life</h1></div>
    	<div><br><br><br></div>

        <button onclick="showCart()"><i class="fa fa-cart-plus" style="font-size:30px;color:red">GO!</i></button>
        <button id="signout" onclick="signout()"><i class="fa fa-frown-o" style="font-size:20px;color:grey">Sign Out!</i></button>
        <button id="signin" onclick="signin()"><i class="fa fa-smile-o" style="font-size:20px;color:grey">Sign In!</i></button>


    	<div class="column"  style='border: 3px lightblue dotted; padding: 3px'>

    		<script type="text/javascript">
    		var x = localStorage.getItem("product");
            setCookie("product",x);
    		document.write("<div><img src='" + x + ".jpg' width ='500px' height ='500px'>" + "</div>");
    		var y = getCookie("price");
            </script>

    		<div>
       		<p id="name"></p>
    		<p id="price"></p>
    		<p id="price">**In stock**</p>
    		<p><br><br>*Hand-crafted and Hand-painted<br>
			*Oriental Collectible Doll Figurine<br>
			*Home-Decor<br>
			*Porcelain Figurine<br>
			*Porcelain Collectible<br></p>
    		<script type="text/javascript">
    		document.getElementById("name").innerHTML = "product name: " + x;
            document.getElementById("price").innerHTML= "product price: $" + y;


    		</script>
    		</div>


       	    <div>
    		<button onclick="addCart(x,y,1)">Add To Cart<i class="fa fa-cart-plus" style="font-size:30px;color:blue"></i></button>
            <script type="text/javascript">
                function addCart(name,price,inventory){
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

                function showCart(){
                    window.location.assign('cart.php');
                }

                function signout(){

                    window.location.assign('Signout.php');

                }

                function signin(){
                    <?php setcookie("username", null); ?>
                    window.location.assign('Login.php');
                 }


            </script>
            
    		</div>

    	</div>


    </body>
</html>
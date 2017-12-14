<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <script type="text/javascript" src="cookieFunction.js"></script>
        <link rel="stylesheet" type="text/css" href="stylesheet.css" >
        <title>Check your cart!</title>
         <?php

    include "header.html";
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

        <button id="signout" onclick="signout()"><i class="fa fa-frown-o" style="font-size:20px;color:grey">Sign Out!</i></button>
        <button id="signin" onclick="signin()"><i class="fa fa-smile-o" style="font-size:20px;color:grey">Sign In!</i></button>

        <script type="text/javascript">

             function signout(){

                    window.location.assign('Signout.php');

                }

                function signin(){
                    <?php setcookie("username", null); ?>
                    window.location.assign('Login.php');
                 }

        </script>

<table style ='width: 80%'>
    <tr>
    <th style="font-size: 30px">Shopping Cart</th>
    <th>Product Name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Amount</th>
    </tr>


<script type="text/javascript">

    
    var numItems = localStorage.getItem("numItems");

    var total = 0;
    for (var i = 0; i < numItems; i++) {

        var cart = JSON.parse(localStorage.getItem(i));
            var amount = cart.price * cart.inventory;
            var amount_format = Number(amount).toFixed(2);
            document.write("<tr>");
            document.write("<td align='center'><img src='"+cart.name+".jpg' width='80px' height='80px'></img></td>");
            document.write("<td align='center'>"+cart.name+"</td>");
            document.write("<td align='center'>"+cart.price+"</td>");
            // document.write("<td align='center'>"+cart.inventory+"</td>");

            document.write("<td align='center'><input align ='center' id='quantity"+i+"' type='text' size='3' value='"+cart.inventory+"'></td>");
            // document.getElementById("quantity"+i).value = cart.inventory;

            document.write("<td align='center' id='amount"+i+"'>"+amount_format+"</td>");  
            document.write("<tr>"); 
            
    }

            function confirmFunction(){

                    var numItems = localStorage.getItem("numItems");
                    
                    if(getCookie("username")){
                    var total = 0;
                    for (var i = 0; i < numItems; i++) {
                        var cart = JSON.parse(localStorage.getItem(i));
                        var q = document.getElementById("quantity"+i).value;
                        var amount = Number(q * cart.price).toFixed(2);
                        document.getElementById('amount'+i).innerHTML = amount;
                        total = total*1 + amount*1;
                        }
                        document.getElementById("total").innerHTML = "Total Amount for the order: "+ Number(total).toFixed(2);
                    }
                    
                    var bankroll = Number(total).toFixed(2);
                    setCookie("bankroll", bankroll,1);


                }
                        document.write("<p id='total'>**</p>");   
                
                function checkFunction(){

                    window.location.assign('check.php');
                    
                     
                }



        </script>
        <br><br>
        <button onclick='confirmFunction()'>Confirm Order!</button>
        <button onclick='checkFunction()'>Go for Check!</button>


    	
    </body>



    </html>
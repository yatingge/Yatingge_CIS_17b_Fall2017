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
        <link rel="stylesheet" type="text/css" href="stylesheet.css" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<?php

include "sql/connect_mysql.php";
include "header.html";

if(isset($_COOKIE['username'])){
        $username = $_COOKIE["username"];
        setcookie("username", $username, time() + (86400 * 30));
        echo "<p>Welcome to Doll Store!". $username .'</p>';
    }else{
        echo "<p>Plese sign into your account for shopping!</p>";
    }

$username = $_COOKIE['username'];

$id_user = "";
$sql = "SELECT id_user FROM client_entity WHERE username = '" . $username . "'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id_user = $row['id_user'];
       

			session_start();
			$_SESSION['bankroll'] = $_COOKIE['bankroll'];

			$bankroll = $_SESSION['bankroll'];

			if($bankroll){

				$sql = "INSERT INTO cart_entity (id_user, bankroll)
                VALUES ('$id_user', '$bankroll')";
                if ($conn->query($sql) === TRUE) {
                        echo "New cart created successfully!";
                    }

			}
			session_unset();
		}

		       echo "<table align='center' cellspacing='0' cellpadding='5' width='75%'>
               <tr>
               <th>Cart Num</th>
               <th>Order Payment</th>
               </tr>";

$sql = "SELECT id_cart, bankroll FROM cart_entity WHERE id_user = '" . $id_user . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
            $i=0;
            while($row = $result->fetch_assoc()){

            	echo "<tr align='center'>";
                echo "<td>" . $row['id_cart'] . "</td>";
                echo "<td>" . $row['bankroll'] . "</td>";
                echo "</tr>";

            }
        }

?>
</head>
<body>
	<button id="signout" onclick="signout()"><i class="fa fa-frown-o" style="font-size:20px;color:grey">Sign Out!</i></button>
    <button id="signout" onclick="signin()"><i class="fa fa-smile-o" style="font-size:20px;color:grey">Sign In!</i></button>
    <script type="text/javascript">
    	 function signout(){

                    window.location.assign('Signout.php');

                }

                function signin(){
                    <?php setcookie("username", null); ?>
                    window.location.assign('Login.php');
                 }
    </script>
</body>
</html>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here


        $servername = "207.0.0.1";
        $username = "root";
        $password = " ";
        $dbname = "mydb";

// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

//        echo 'Connected Successfully';
        echo '<p>***** ***** ***** ***** *****</p>';
        echo '<p>***** ***** ***** ***** *****</p>';
        ?>
    </body>
</html>

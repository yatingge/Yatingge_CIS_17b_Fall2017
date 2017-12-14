<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Login Page!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>

            body{
                /* background-color: AntiqueWhite;*/
                margin:200px 150px 100px 80px;
                background-image:url("background.jpg");
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-position: center;
            }

            h1{
                text-align: center;
                font-family: "Comic Sans MS", cursive, sans-serif;
                font-size: 40px;

            }

            h4{
                text-align: center;
                font-family: "Comic Sans MS", cursive, sans-serif;
                font-size: 18px;

            }

            span{
                font-family: "Comic Sans MS", cursive, sans-serif;
                font-size:x-small;
            }

            .button{
                background-color: lightyellow;
                text-align: center;
                position: absolute;
                left: 130px;
                top:215px;
                border:1px dotted;
            }
        </style>

    </head>

    <?php
    include 'sql/connect_mysql.php';

    //check whether username and password have been registed!
    $email_Err = "";
    $pswd_Err = " ";
    $username = " ";
    if (isset($_POST['userInput']) && isset($_POST['passwordInput'])) {
        $username = mysqli_real_escape_string($conn, $_POST['userInput']);
        $sql = "SELECT id_user, username, email, password FROM client_entity WHERE username = '" . $username . "'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        
        $password = mysqli_real_escape_string($conn, $_POST['passwordInput']);
        $password_hashed=$row['password'];


        if ($username != $row['username']) {
            $email_Err = "<p>your username is incorrect. please check them and try again!<br></p>";

        } elseif (!password_verify($password, $password_hashed)) {
            $pswd_Err = "<p>your password is incorrect. please check them and try again!</p><br>";

        } else {
            echo "<script> window.location.assign('storefront.php'); </script>";
        }

        setcookie("username", $username, time() + (86400 * 30), "/");
    }

    ?>


    <body>
        <div class="center">
            <h1>Welcome to Dolls Store</h1>

            <!-- <div class="admin">
                <button class ="button"  onclick="window.location.assign('userview.php')">Admin~Click here!</button>
            </div> -->

            <form action ="" method="POST">
                <h4>Enter your username:<input type ="text" 
                                               placeholder= "username"
                                               name="userInput" 
                                               pattern="[a-zA-Z0-9]{2,15}" 
                                              
                                               title="Username should only contain characters and numbers"

                                               required 
                                               ><?php echo "<span style = 'color:red'>" . $email_Err . "</span>" ?></h4>


                <h4>Enter your password:<input type ="password" 
                                               placeholder="password"
                                               name="passwordInput"
                                             
                                               pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15})"
                                               title="8 to 15 characters,with at least one uppercase letter, one lowercase letter, and one digit"

                                               required 
                                               ><?php echo "<span style = 'color:red'>" . $pswd_Err . "</span>" ?></h4>

                <h4><input type="submit" value="Sign In"></h4>
            </form>

            <h4>Not a member Yet? <a href="registration.php">Join Us!</a>(Click for sign up)</h4></div>

    </body>
</html>

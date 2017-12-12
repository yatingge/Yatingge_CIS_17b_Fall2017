<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit a user </title>
    </head>
    <body>
        <?php
        // put your code here
        include "connect_mysql.php";

        $url = $_SERVER['REQUEST_URI'];
        $username = parse_url($url, PHP_URL_QUERY);

        echo "<p>Edit user: " . $username . "</p>";

        $sql = "SELECT id_user, username, email, password FROM user_entity WHERE username = '" . $username . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo '<form action = "" method ="POST">
        User name: <input type = "text" name = "name" value = ' . $row['username'] . '><br><br>
        Email address: <input type = "text" name = "emailadd" value = ' . $row['email'] . '><br><br>
        Password: <input type = "text" name = "pswd" value = ' . $row['password'] . '><br><br>
        <input type = "submit" value = "Submit">
        </form>';
        }

        if (isset($_POST['name']) && $_POST['name'] !== $username) {
            $sql = "UPDATE user_entity SET username= '" . $_POST['name'] . " 'WHERE username = '" . $username . "'";
            if ($conn->query($sql) === TRUE) {
                echo "Username: Record has updated successfully<br>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

        if (isset($_POST['emailadd']) && $_POST['emailadd'] !== $row['email']) {
            $sql = "UPDATE user_entity SET email= '" . $_POST['emailadd'] . " 'WHERE username = '" . $username . "'";
            if ($conn->query($sql) === TRUE) {
                echo "Email: Record has updated successfully<br>";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }


        if (isset($_POST['pswd']) && $_POST['pswd'] !== $row['password']) {
            $sql = "UPDATE user_entity SET password= '" . $_POST['pswd'] . " 'WHERE username = '" . $username . "'";
            if ($conn->query($sql) === TRUE) {
                echo "Password: Record has updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

        echo '<p>Go back to userview page!Click <a href="userveiw_survey.php"> ***here*** </p>';
        ?>



    </body>
</html>
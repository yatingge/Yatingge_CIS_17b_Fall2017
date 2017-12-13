<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>

        
    </head>
    <body>


        <?php
        include 'sql/connect_mysql.php';
        include 'header.html';

        $passwordErr = "";
        $usernameErr = "";
        $emailErr = "";
        $rgst = "";  //register information

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $problem = FALSE;

            if ($_POST['password1'] != $_POST ['password2']) {
                $problem = TRUE;
                $passwordErr = 'Your password did not match your confirmed password!';
                $rgst = "Register Failed!!";
            } else {

                //if registered, add new user information to mysql
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $password = mysqli_real_escape_string($conn, $_POST['password1']);
                $password_hashed = password_hash($password, PASSWORD_DEFAULT);
                
                setcookie("hash",$password_hashed);

                //check for duplicate username
                $checkdup_username = "SELECT * FROM client_entity WHERE username = '" . $username . "'";
                $result_name = $conn->query($checkdup_username);
                $count1 = $result_name->num_rows;

                //check for duplicate email
                $checkdup_email = "SELECT * FROM client_entity WHERE email = '" . $email . "'";
                $result_email = $conn->query($checkdup_email);
                $count2 = $result_email->num_rows;

                if ($count1 == 1) {
                    $usernameErr = 'Error!' . "$username" . ' already exsists in the database';

                } elseif ($count2 == 1) {
                    $emailErr = 'Error!' . "$email" . ' already exsists in the database';

                } else {
                    $sql = "INSERT INTO client_entity (username, email, password)
                VALUES ('$username', '$email', '$password_hashed')";  // The sha1() function uses the US Secure Hash Algorithm 1.

                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                        $rgst = "Register successfully!<p>Go Back to Login page!Click<a href='Login.php'> **here** </a></p>";
                    } else {
                        echo 'Error:' . $sql . '<br/>' . $conn->error;
                    }
                }
            }
        }
        ?>


        <h2>***********Register Form**********</h2>

        <form class="form" action="registration.php" method="post" enctype="multipart/form-data" autocomplete="off">
            <p>User Name: <input type="text" placeholder="User Name" name="username" required
                                 pattern="[a-zA-Z0-9]{2,15}" size="80"/>
                <span>Note:only enter characters and numbers</span>
                <span style="color:red"><?php echo $usernameErr; ?></span></p>

            <p>Email: 
                <input type="email" placeholder="Email" name="email" required 
                       pattern="(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})"
                       title="valid email address" size="80"/>
                <span style="color:red"><?php echo $emailErr; ?></span></p>

            <p>Password: 
                <input type="password" placeholder="Password" name="password1" required 
                       pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15})"
                       title="8 to 15 characters,with at least one uppercase letter, one lowercase letter, and one digit" size="80"/>
                <span>Note: 8 to 15 characters,with at least one uppercase letter, one lowercase letter, and one digit</span></p>

            <p>Confirm Password: <input type="password" placeholder="Comfirm Password" name="password2" size="80" required/>
                <span style="color:red"><?php echo $passwordErr; ?></span></P>

            <input type="submit" value="Register" name="register" />

            <p><?php echo $rgst; ?></p>

             <h4>Already a member!<a href="Login.php">Join Us!</a>(Click for sign in)</h4></div>


        </form>


    </body>
</html>

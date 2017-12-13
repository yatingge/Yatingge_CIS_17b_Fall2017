<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up for  your free account</title>
        <style>

            input{
                width: 50%;
            }

        </style>
    </head>
    <body>

        <h1>Sign Up for your FREE Survey account!</h1>
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
                $password = password_hash($password, PASSWORD_BCRYPT);

                //check for duplicate username
                $checkdup_username = "SELECT * FROM user_entity WHERE username = '" . $username . "'";
                $result_name = $conn->query($checkdup_username);
                $count1 = $result_name->num_rows;

                //check for duplicate email
                $checkdup_email = "SELECT * FROM user_entity WHERE email = '" . $email . "'";
                $result_email = $conn->query($checkdup_email);
                $count2 = $result_email->num_rows;

                if ($count1 == 1) {
                    $usernameErr = 'Error!' . "$username" . ' already exsists in the database';
                } elseif ($count2 == 1) {
                    $emailErr = 'Error!' . "$email" . ' already exsists in the database';
                } else {

                    $sql = "INSERT INTO user_entity (username, email, password)
                VALUES ('$username', '$email', '$password')";  // The sha1() function uses the US Secure Hash Algorithm 1.

                    if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully";
                        
                        echo '<p id="redirect"><script>function Redirect(){
                            window.location="SignIn.php";}
                            document.getElementById("redirect").innerHTML = "Register successfully!You will be redirected to a new page in 5 seconds!";
                            setTimeout("Redirect()",3000);
                            </script></p>';

                    } else {
                        echo 'Error:' . $sql . '<br/>' . $conn->error;
                    }
                }
            }
        }
        ?>

        <form class="form" action="SignUp.php" method="post" enctype="multipart/form-data" autocomplete="off">
           <b>User Name:</b>
                <p><input type="text" placeholder="User Name" name="username" required
                          pattern="[a-zA-Z0-9]{2,15}"/>
                    <span>Note:only enter characters and numbers</span>
                    <span style="color:red"><?php echo $usernameErr; ?></span></p>

               <b>Email: </b>
                        <p><input type="email" placeholder="Email" name="email" required 
                                  pattern="(\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,6})"
                                  title="valid email address"/>
                            <span style="color:red"><?php echo $emailErr; ?></span></p>

               <b>Password: </b>
                        <p><input type="password" placeholder="Password" name="password1" required 
                                  pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15})"
                                  title="8 to 15 characters,with at least one uppercase letter, one lowercase letter, and one digit"/>
                            <span>Note: 8 to 15 characters,with at least one uppercase letter, one lowercase letter, and one digit</span></p>

                <b>Confirm Password:</b> 
                        <p><input type="password" placeholder="Comfirm Password" name="password2" required/>
                            <span style="color:red"><?php echo $passwordErr; ?></span></p>

                        <input type="submit" value="Register" name="register" />


                        </form>

                        </body>
                        </html>

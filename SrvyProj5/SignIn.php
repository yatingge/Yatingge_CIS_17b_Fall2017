
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Sign Into your account!</title>
        <script type="text/javascript" src="cookies.js"></script>

    </head>

        <?php
    include 'sql/connect_mysql.php';
    include 'header.html';

    //check whether username and password have been registed!
    $email_Err = "";
    $pswd_Err = " ";
    if (isset($_POST['userInput']) && isset($_POST['passwordInput'])) {
        $username = mysqli_real_escape_string($conn, $_POST['userInput']);
        $sql = "SELECT id_user, username, email, password FROM user_entity WHERE username = '" . $username . "'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $pswd = mysqli_real_escape_string($conn, $_POST['passwordInput']);

        if ($username != $row['username']) {
            $email_Err = "<p>your username is incorrect. please check them and try again!<br></p>";
        } elseif ($pswd != $row['password']) {
            $pswd_Err = "<p>your password is incorrect. please check them and try again!</p><br>";
        } else {
          echo "<script>localStorage.removeItem('title');</script>";
            echo "<script> window.location.assign('createSurvey.php?userInput=" . $username . "'" . "); </script>";
        }
    }
        setcookie("username", $username,time()+3600);


    ?>

 

    <body>
      <div class="center">
        <h1>Sign into your account!</h1>

        <form action ="" method="POST">
                <h4>Enter your username:<input type ="text" 
                                               placeholder= "username"
                                               name="userInput" 
                                               pattern="[a-zA-Z0-9]{2,15}" 
                                               size="15"
                                               title="Username should only contain characters and numbers"

                                               required 
                                               ><?php echo "<span style = 'color:red'>" . $email_Err . "</span>" ?></h4>


                <h4>Enter your password:<input type ="password" 
                                               placeholder="password"
                                               name="passwordInput"
                                               size ="15"
                                               pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15})"
                                               title="8 to 15 characters,with at least one uppercase letter, one lowercase letter, and one digit"
                                               required 
                                               ><?php echo "<span style = 'color:red'>" . $pswd_Err . "</span>" ?></h4>

                <h4><input type="submit" value="Sign In"></h4>
            </form>

            <h4>Don't have an account? <a href="SignUp.php">Sign Up!</a>(Click for sign up)</h4></div>

        
      </div>
    </body>
</html>



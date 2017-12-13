
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Login Page!</title>

<?php
include "header.html";
setcookie("username", null, time() - (86400 * 30), "/");

echo "<p>You have signed out.</p>";

if(isset($_COOKIE['username'])){
	unset($_COOKIE['username']);

	echo '<p id="redirect"><script>function Redirect(){
                            window.location="storefront.php";}
                            document.getElementById("redirect").innerHTML = "Sign out successfully!You will be redirected to a new page in 5 seconds!";
                            setTimeout("Redirect()",3000);
                            </script></p>';
}

?>

</head>
<body>

	
</body>
</html>
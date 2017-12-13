<!DOCTYPE html>
<html>
<head>
	<title>Sign Out!</title>

<?php

include "header.html";

setcookie("username", null);

?>

</head>
<body>
	<br><br><br><br><br><br><br><br><br>
	<p>You have Signed Out Sucessfully!</p> 
	<p>Want to Sign again? Clike the button!
	<button onclick="signin()">Sign In</button></p>
	<script type="text/javascript">

    function signin(){

        window.location.assign("SignIn.php");

    }
</script>

	
</body>
</html>
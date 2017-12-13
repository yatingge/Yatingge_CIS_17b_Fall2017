
<!DOCTYPE html>
<html>
<head>
	<title>Congratulations! You have made a new survey by your own!!</title>
    <script type="text/javascript" src="cookieFunction.js"></script>


<?php

include "insert_survey_question_answer.php";
include "header.html";

?> 


</head>
<body>

	<p>Congratulations! <span id="username"></span></p>
	<script type="text/javascript">
		document.getElementById('username').innerHTML = getCookie('username');
	</script>
	<p> You have successfully created your SURVEY! </p>
	<p> Go to check Your NEW-CREATED SURVEY! </p>
	<p id='redirect'></p>
	<script>function Redirect(){
            window.location="viewSurvey.php";}
            document.getElementById("redirect").innerHTML = "Register successfully!You will be redirected to a new page in 3 seconds!";
            setTimeout("Redirect()",3000);
            </script>

</body>
</html>

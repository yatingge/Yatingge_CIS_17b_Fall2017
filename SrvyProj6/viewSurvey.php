<!DOCTYPE html>
<html>
<head>
	<title>Direct to Your Survey!</title>
    <script type="text/javascript" src="cookieFunction.js"></script>


<?php

include "sql/connect_mysql.php";
include "header.html";
echo "<br><br><br>";
if(isset($_COOKIE['username'])){
	$username = $_COOKIE['username'];
	echo '<p>Survey Creator: '.$username.'<br>';
}

$sql = "SELECT id_user FROM user_entity WHERE username = '" . $username . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$id_user = $row['id_user']; 



$sql = "SELECT title,id_survey 
FROM survey_entity
WHERE id_user = '".$id_user."'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "Survey Created: <br>";
	while($row = $result->fetch_assoc() ){
	echo "<a href='survey.php?".$row['title']."'>".$row['title']. "</p>";

	}
}

?> 

</head>
<body>

	
</body>
</html>

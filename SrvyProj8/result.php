<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Display Survey Results!</title>
        <script type="text/javascript" src="cookies.js"></script>

    </head>


    <?php

    include "sql/connect_mysql.php";
    include "header.html";

    if(isset($_COOKIE['username'])){
	$username = $_COOKIE['username'];
	echo '<h3><p>Survey Creator: '.$username.'<br></h3>';
}


	//select id_user
	$sql = "SELECT id_user FROM user_entity WHERE username = '" . $username . "'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$id_user = $row['id_user']; 

	//get the survey title from url
	$url = urldecode($_SERVER['REQUEST_URI']);
	$title = parse_url($url, PHP_URL_QUERY);

	//select id_survey
	$sql = "SELECT id_survey FROM survey_entity WHERE title = '" . $title . "'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$id_survey = $row['id_survey']; 

	echo '<h3><p>Survey Title: '.$title.'<br></h3>';

	echo '<p>Survey Results: <br></p>';


	$sql = "SELECT id_question, count(*) FROM result_entity 
	WHERE id_survey = $id_survey GROUP BY id_question";
   

    //display results
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {

		$i = 1;
		while($row = $result->fetch_assoc() ){
            
            echo "Question".$i.": <br>";
			$x = $row['id_question'];
            $sql = "SELECT answer, COUNT(*) FROM result_entity WHERE id_question= $x GROUP BY answer";
            $result_ans = $conn->query($sql);
            if ($result_ans->num_rows > 0) {
				while($row_ans = $result_ans->fetch_assoc() ){

					echo $row_ans['answer'].": ";
					// echo $row_ans['COUNT(*)']."<br>";

					$ans_percent = ($row_ans['COUNT(*)'] / $row['count(*)']) * 100;
					$format = number_format($ans_percent, 2);
					echo $format."%<br>";
				}
			}

			echo "<br>";
			++$i;
	
	} 
}



    ?>

<!-- SELECT COUNT(*) FROM result_entity; -> 8
SELECT id_question, count(*) FROM result_entity GROUP BY id_question; -->


    </head>

<body>

	<p><button onclick="signout()">Sign Out</button><button onclick="signin()">Sign In</button></p>

<script type="text/javascript">

    function signout(){

        window.location.assign("Signout.php");

    }

    function signin(){

        window.location.assign("SignIn.php");

    }
</script>

	
</body>
</html>
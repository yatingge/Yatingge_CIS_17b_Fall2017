<?php

  include "sql/connect_mysql.php";


    if(isset($_COOKIE['username']) && isset($_COOKIE['title'])){
      
        // get the id_user from user_entity 
      $username = $_COOKIE['username'];
      $sql = "SELECT id_user, username, email, password FROM user_entity WHERE username = '" . $username . "'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $id_user = $row['id_user'];            // get id_user throungh the cookies[username]
          
    //insert data into survey entity
    $title = mysqli_real_escape_string($conn, $_COOKIE['title']);
    $sql = "INSERT INTO survey_entity (title, id_user) VALUES ('$title', '$id_user')"; 

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully in the table survey_entity<br>";
    }else{
      echo 'Error:' . $sql . '<br/>' . $conn->error;
    } 


    $sql = "SELECT id_survey, title, id_user FROM survey_entity WHERE title = '" . $title . "'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $id_survey = $row['id_survey'];    


    if(isset($_COOKIE['len'])){
      $len = $_COOKIE['len'];
      for($i=1; $i <= $len; $i++) {

        if(isset($_COOKIE['question'.$i])){

          // get the user questions through cookies
          $questions = $_COOKIE['question'.$i];
          $qstn_array = json_decode($questions, true);
          echo var_dump($qstn_array);
          $question = $qstn_array['qstn'];
                
                //insert into the question_entity table
          $sql = "INSERT INTO question_entity (question, id_survey, id_user) VALUES ('$question', '$id_survey', '$id_user')";  
          if ($conn->query($sql) === TRUE) {
              echo "New record created successfully in the table question_entity";
          }else{
              echo 'Error:' . $sql . '<br/>' . $conn->error;
          }
  
        //insert into the answer_entity table
        $sql = "SELECT id_question FROM question_entity WHERE question = '" . $question . "'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $id_question = $row['id_question'];    

        $answers_len = count($qstn_array['ans']);
          for($j=0; $j < $answers_len; $j++){
              $answer = $qstn_array['ans'][$j];
              $choice = 0;
              $sql = "INSERT INTO answer_entity (answer,choice, id_question, id_survey, id_user) VALUES ('$answer', '$choice', '$id_question', 
              '$id_survey', '$id_user')";  
              if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully in the table answer_entity<br>";
                }else{
                echo 'Error:' . $sql . '<br/>' . $conn->error;
              }
            }
          }
      }
    }

}

?>
<?php

// check what type of request is being made
$type = $_POST['type'];

// to send the request off to the right function
if($type == 'submitquestion'){
    submitNewQuestion();
}
else if($type == 'checkstatus'){
    
    checkQuestionStatus();
}

else if($type == 'gotAnswer'){
    
    gotAnswer();
}


function checkQuestionStatus(){
    
    // database connection
      try {
        $host = '127.0.0.1';
        $dbname = 'test';
        $user = 'root';
        $pass = 'doa24710';
        # MySQL with PDO_MYSQL
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    } catch(PDOException $e) {echo $e;}  
    
    $id = $_POST['id'];
    
    $q = $DBH->prepare("select status from iwa2016 where id = :currentId");
    $q->bindValue(':currentId',  $id);
   
    $q->execute();
    
    $row = $q->fetch(PDO::FETCH_ASSOC);

    echo $row['status'];

    
}

function gotAnswer(){
    
    // database connection
      try {
        $host = '127.0.0.1';
        $dbname = 'test';  
        $user = 'root';
        $pass = 'doa24710';
        # MySQL with PDO_MYSQL
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    } catch(PDOException $e) {echo $e;}  
    
    $id = $_POST['id'];
    
    $q = $DBH->prepare("select answer from iwa2016 where id = :currentId");
    $q->bindValue(':currentId',  $id);
   
    $q->execute();
    
    $row = $q->fetch(PDO::FETCH_ASSOC);

    echo $row['answer'];

    
}
function submitNewQuestion(){
    //catching the variables
    $name =  $_POST['app_name'];
    $question = $_POST['app_ques'];
    
    // database connection
      try {
        $host = '127.0.0.1';
        $dbname = 'test';
        $user = 'root';
        $pass = 'doa24710';
        # MySQL with PDO_MYSQL
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    } catch(PDOException $e) {echo $e;}  


    
   
    $q = $DBH->prepare("INSERT INTO `test`.`iwa2016` (`name`, `question`) VALUES (:name, :question);");
    $q->bindValue(':name',  $name);
    $q->bindValue(':question',  $question);
    $q->execute();
   
    
    echo $DBH->lastInsertId();
    
}

?>
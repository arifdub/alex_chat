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
    
    include("dbconnection.php");
    
    $id = $_POST['id'];
    
    $q = $DBH->prepare("select status from iwa2016 where id = :currentId");
    $q->bindValue(':currentId',  $id);
   
    $q->execute();
    
    $row = $q->fetch(PDO::FETCH_ASSOC);

    echo $row['status'];

    
}

function gotAnswer(){
    
    include("dbconnection.php");
    
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
    
    include("dbconnection.php");


    
   
    $q = $DBH->prepare("INSERT INTO `test`.`iwa2016` (`name`, `question`) VALUES (:name, :question);");
    $q->bindValue(':name',  $name);
    $q->bindValue(':question',  $question);
    $q->execute();
   
    
    echo $DBH->lastInsertId();
    
}

?>
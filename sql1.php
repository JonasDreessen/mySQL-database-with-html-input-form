<?php 

$stmt = "mysql:host=localhost;dbname=Api_exercise_becode;charset=utf8mb4";     
    $pdo = new PDO($stmt, "root", "root", $options);
    // insert data in mysql

    if($_POST['submitinput']){
        if (empty($inputMessage)){
            echo "type in the message you would like to insert";
        }else if(empty($title)){ 
            echo "type in the title you would like to insert";
        } else{ 
            $stmt = $pdo->prepare("INSERT INTO notes (title,message_text) VALUES (?, ?)");
            $stmt->execute([$title, $inputMessage]);
            $stmt = null;
        }
    }

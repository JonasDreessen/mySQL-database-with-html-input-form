<?php
header("Access-Control-Allow-Origin: *");
$title = $_POST["title"];
$inputMessage = $_POST["textmessageInput"];
$updateTitle = $_POST["updateTitle"];
$updateInputMessage = $_POST["updateTextMessageInput"];
$deleteTitle = $_POST['deleteTitle'];
$searchTitle = $_GET['searchTitle'];

set_exception_handler(function($e) {
        error_log($e->getMessage());
        exit('Something weird happened'); //something a user can understand
    });
    $options = [
        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
    ];
    
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


    // update data from mysql
    if($_POST['submitupdate']){
        if (empty($updateInputMessage)){
            echo "type in the message you would like to update";
        }else if(empty($updateTitle)){ 
            echo "type in the title you would like to update";
        } else{ 
            $stmtupdate = $pdo->prepare("UPDATE notes SET message_text=? WHERE title=?"); 
            $stmtupdate->execute([$updateInputMessage, $updateTitle]); 
            echo "Records was updated successfully."; 
    }
}

    if($_POST['submitdelete']){
        if (empty($deleteTitle)){
            echo "type in the title you would like to delete";
        } else{  
            $stmtdelete = $pdo->prepare("DELETE FROM notes WHERE title=?"); 
            $stmtdelete->execute([$deleteTitle]); 
            echo "Records was deleted successfully.";
        }
    }

    if($_GET['submitsearch']){
        if (empty($searchTitle)){
            echo "type in the title you would like to search";
        } else{  
            $stmtsearch = $pdo->prepare("SELECT message_text FROM notes WHERE title = ?"); 
            $stmtsearch->execute([$searchTitle]); 
            echo "Records was searched successfully.";
        }
    }

    // fetch data from mysql and convert to jsonfile
    $data = $pdo->query("SELECT * FROM notes")->fetchAll();
    $json = json_encode($data);
    print_r($json); 

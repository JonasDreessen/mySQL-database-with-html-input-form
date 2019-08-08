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

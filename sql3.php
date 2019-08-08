if($_POST['submitdelete']){
        if (empty($deleteTitle)){
            echo "type in the title you would like to delete";
        } else{  
            $stmtdelete = $pdo->prepare("DELETE FROM notes WHERE title=?"); 
            $stmtdelete->execute([$deleteTitle]); 
            echo "Records was deleted successfully.";
        }
    }

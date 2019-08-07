<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php communication</title>
</head>
<body>
    <?php 
    include("servercommunication.php");
    ?>
    <form method="POST" <?php echo $_SERVER['PHP_SELF'] ?> >
        <input type="text" name="title" placeholder="your title"/> 
        <input type="text" name="textmessageInput" placeholder="Your message" /> 
        <input type="submit" name="submitinput" value="insert"/> 
    </form> 

    <form method="POST"> 
        <input type="text" name="updateTitle" placeholder="update your title" /> 
        <input type="text" name="updateTextMessageInput" placeholder="update your message" /> 
        <input type="submit" name="submitupdate" value="update" /> 
    </form> 

    <form method="POST"> 
        <input type="text" name="deleteTitle" placeholder="delete your title" /> 
        <input type="submit" name="submitdelete" value="delete" /> 
    </form> 
    <form method="POST"> 
        <input type="text" name="searchTitle" placeholder="fill in your title" class="specificmessagetitle" /> 
        <!--<input type="submit" name="submitsearch" /> -->
        <button class="getspecificmessage" type="button">GET SPECIFIC MESSAGE</button>
    </form> 
    <div class="specificmessage">
        
    </div>

    <div class="getallmessagesbutton">
        <button id="getallmessages" type="button">GET ALL MESSAGES!</button>
        <div class="allmessages">
            
        </div>
    </div>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="main.js"></script>
    
</body>
</html>
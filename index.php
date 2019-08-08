<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style/style.css">
    <title>php communication</title>
</head>
<body>
    <?php 
    include("servercommunication.php");
    ?>
    <div class="nav-container">
        <nav class="navbar">
            <ul class="nav-items">
                <li class="nav-item" id="insert">Insert</li>
                <li class="nav-item" id="update">Update</li>
                <li class="nav-item" id="delete">Delete</li>
                <li class="nav-item" id="search-message">Search Message</li>
                <li class="nav-item" id="search-all">Search all</li>
            </ul>
        </nav>
    </div>
    <div class="form-container insert">
    <h3 class="form-title">insert new message</h3>
    <form method="POST" <?php echo $_SERVER['PHP_SELF'] ?> >
        <input type="text" name="title" placeholder="your title"/> 
        <input type="text" name="textmessageInput" placeholder="Your message" /> 
        <input type="submit" name="submitinput" value="insert" class="submitbutton"/> 
    </form> 
    </div>

    <div class="form-container update">
    <h3 class="form-title">Update message</h3>
    <form method="POST"> 
        <input type="text" name="updateTitle" placeholder="update your title" /> 
        <input type="text" name="updateTextMessageInput" placeholder="update your message" /> 
        <input type="submit" name="submitupdate" value="update" class="submitbutton" /> 
    </form> 
    </div>

    <div class="form-container delete">
    <h3 class="form-title">Delete message</h3>
    <form method="POST"> 
        <input type="text" name="deleteTitle" placeholder="delete your title" /> 
        <input type="submit" name="submitdelete" value="delete" class="submitbutton" /> 
    </form> 
    </div>

    <div class="form-container specific-message">
    <h3 class="form-title">Get message</h3>
    <form method="POST"> 
        <input type="text" name="searchTitle" placeholder="fill in your title" class="specificmessagetitle" /> 
        <!--<input type="submit" name="submitsearch" /> -->
        <button class="getspecificmessage" type="button" class="submitbutton">GET SPECIFIC MESSAGE</button>
    </form> 
    </div>
    <div class="specificmessage">
        
    </div>
    <div class="form-container all-messages">
    <h3 class="form-title">Get all messages</h3>
    <div class="getallmessagesbutton">
        <button id="getallmessages" type="button" class="submitbutton">GET ALL MESSAGES!</button>
        <div class="allmessages">
            
        </div>
        
    </div>
    </div>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="main.js"></script>
    
</body>
</html>
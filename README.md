# mySQL database with html input form and API 
## Steps for creating this file
  1. create mySQL database
  2. write SQL to insert notes with titles
  3. write SQL to update notes with titles
  4. write SQL to delete notes with titles
  5. create an API of all the data in the mySQL database 
  6. write Javascript to look for a specific message. 
  7. write Javascript to look for all the messages. 

#### Create mySQL database
     I created the mySQL table on phpMyAdmin using MAMP
     The title is my Primary key, because it will be used to look up the messages related to it so it has to be unique. 
#### write SQL to insert notes with titles
    SQL:  INSERT INTO notes (title,message_text) VALUES (?, ?)". 
          The reason for using ? ? as VALUES is because i use PDO and you have to prepare statements to prevent mysql injections. 
    
#### write SQL to update notes with titles
     SQL: UPDATE notes SET message_text=? WHERE title=?
          ?, ? are variables I use that are filed in by the user. 
     
#### write SQL to delete notes with titles
    SQL: DELETE FROM notes WHERE title=?
         ? is a variable that is filed in by the user. 
    
#### create an API of all the data in the mySQL database
     Here I created a seperate php file and deployed it on my local server. 
     To make it work, PHP has to communicate with the mySQL database. In order to do that you first have to log in: 
     $stmt = "mysql:host=localhost;dbname=databasename;charset=utf8mb4";     
     $pdo = new PDO($stmt, "username", "password", $options);
     
     Now that I am logged in, I will write SQL to select all the data from the table notes. 
     $data = $pdo->query("SELECT * FROM notes")->fetchAll();
     
     fetchAll(); --> returns an array containing all of the remaining rows in the result set.
     This data will be converted to a json file (json_encode();).
     
     $json = json_encode($data);
     print_r($json); 


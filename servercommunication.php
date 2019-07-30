<?php

$htmlFirstName = $_GET["firstname"];
$htmlLastName = $_GET["lastname"];
$htmlMessage = $_GET["textmessage"];

$myPDO = new PDO('mysql:host=localhost;dbname=Api_exercise_becode', 'root', 'root');
$result = $myPDO->query("INSERT INTO user_information (first_name, last_name, text_message)
    VALUES ('$htmlFirstName', '$htmlLastName', '$htmlMessage')");
    
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    header( 'Location: index.html' );
<?php
$stmt = "mysql:host=localhost;dbname=Api_exercise_becode;charset=utf8mb4";     
    $pdo = new PDO($stmt, "root", "root", $options);
    $data = $pdo->query("SELECT * FROM notes")->fetchAll();
    $json = json_encode($data);
    print_r($json); 

<?php

    $file = "config/database.json";

    $database = $json = json_decode(file_get_contents($file), true);

    $database["username"];

    $servername =$database["servername"];
    $username =  $database["username"];
    $password = $database["password"];
    $dbname = $database["dbname"];
    
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
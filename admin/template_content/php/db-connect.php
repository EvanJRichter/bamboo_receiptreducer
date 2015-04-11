<?php
    //connect  to the database
    $servername = "engr-cpanel-mysql.engr.illinois.edu";
    $username = "receiptr_user";
    $password = "bamboo1234";
    $dbname = "receiptr_backend";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
?>

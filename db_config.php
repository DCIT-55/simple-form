<?php
    // Database connection parameters
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPassword = 'root';
    $dbName = 'test_db1';
    $dbSocket = '/Applications/MAMP/tmp/mysql/mysql.sock'; 

    // Establishing the connection
    $mysqli = @new mysqli(
        $dbHost,
        $dbUser,
        $dbPassword,
        $dbName,
        null,
        $dbSocket
    );
        
    // Checking the connection
    if ($mysqli->connect_error) {
        echo 'Errno: ' . $mysqli->connect_errno;
        echo '<br>';
        echo 'Error: ' . $mysqli->connect_error;
        exit();
    }
?>
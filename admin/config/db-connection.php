<?php

    $server_name = 'localhost';
    $db_user_root = 'root';
    $password = '';
    $database_name = 'bookstore';
    $conn = new mysqli($server_name,$db_user_root,$password,$database_name);

    if($conn->connect_error){
        die('Connection Failed.');
    }


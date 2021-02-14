<?php
    $dsn = 'mysql:host=localhost;dbname=____';
    $username = 'root';
    // $password = 'pa55word';

    try {
        $db = new PDO($dsn, $username);
        // $db = new PDO($dsn, $username, $password);

    } catch (PDOException $e) {
        $error_message = 'Database Error: ';
        $error_message .= $e->getMessage();
        echo $error_message;
        exit();
    }

?>
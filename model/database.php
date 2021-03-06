<?php
    $host = getenv('SQL_HOST');
    $dbname = getenv('SQL_DB');
    $dsn = "mysql:host={$host};dbname={$dbname}";
    $username = getenv('SQL_USER');
    $password = getenv('SQL_PW');

    try {
//         $db = new PDO($dsn, $username);      // without password
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = 'Database Error: ';
        $error_message .= $e->getMessage();
        include('view/error.php');
        exit();
    }
?>

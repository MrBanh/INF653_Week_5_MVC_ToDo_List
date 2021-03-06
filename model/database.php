<?php
    $dsn = 'mysql:host=lyn7gfxo996yjjco.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=po05qwrstus3lqef';
    $username = 'rahry4259ykbayrv';
    $password = 'xnytpzul5bviio06';

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

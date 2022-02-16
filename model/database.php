<?php
    $dsn = 'mysql:host=localhost;dbname=adjendaDatabase';
    $username = 'adjenda';
    $password = 'adjendapass';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occured while connecting
				to the database: $error_message</p>";
        exit();
    }
?>
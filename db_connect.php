<?php
try {
    $host = 'localhost';
    $dbname = 'sherd_Dtzul04';
    $username = 'sherd_Dtzul04';
    $password = 'bk1wJyU7O%AH';

    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
<?php 
require 'db_connect.php';

function getUsers() {
    global $pdo;

    try {
        $stmt = $pdo->prepare("SELECT id, name, email FROM users");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    } catch (PDOException $e) {
        return [];
    }
}

function create_user($username, $password) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        return $pdo->lastInsertId();

    } catch (PDOException $e) {
        return false;
    }
}
?>
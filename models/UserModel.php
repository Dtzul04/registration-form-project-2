<?php
require_once __DIR__ . '/../db_connect.php';

function getUsers() {
    global $pdo;

    try {
        $stmt = $pdo->prepare("SELECT id, username, password, active FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return [];
    }
}

function create_user($username, $password) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, password, active) VALUES (:username, :password, 1)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        return false;
    }
}

function get_user_by_id($id) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("SELECT id, username, password, active FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

function update_user($id, $username, $password) {
    global $pdo;

    try {
        $stmt = $pdo->prepare("UPDATE users SET username = :username, password = :password WHERE id = :id");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    } catch (PDOException $e) {
        return false;
    }
}

function deactivate_user($id) {
    global $pdo;

    try {
        error_log("Attempting to deactivate user with ID: $id");

        $stmt = $pdo->prepare("UPDATE users SET active = 0 WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $success = $stmt->execute();

        if (!$success) {
            $errorInfo = $stmt->errorInfo();
            error_log("SQL Error: " . implode(", ", $errorInfo));
        } else {
            error_log("User $id deactivated successfully!");
        }

        return $success;
    } catch (PDOException $e) {
        error_log("PDO Exception: " . $e->getMessage());
        return false;
    }
}


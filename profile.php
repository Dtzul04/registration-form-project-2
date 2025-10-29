<?php
require_once __DIR__ . '/models/UserModel.php';

if (!isset($_GET['id'])) {
    echo "No user specified.";
    exit();
}

$userId = $_GET['id'];

try {
    global $pdo;
    $stmt = $pdo->prepare("SELECT username, password FROM users WHERE id = :id");
    $stmt->bindParam(':id', $userId);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

include __DIR__ . '/views/profile/show.php';
?>

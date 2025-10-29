<?php
require_once __DIR__ . '/models/UserModel.php';

function getUserById($id) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("SELECT username, password FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}

if (!isset($_GET['id'])) {
    echo "No user specified.";
    exit();
}

$userId = $_GET['id'];
$user = getUserById($userId);

include __DIR__ . '/views/profile/show.php';
?>

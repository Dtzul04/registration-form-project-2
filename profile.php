<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/controllers/UserController.php';

$controller = new UserController();

if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
    $controller->editUser($_GET['id']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update') {
    $controller->updateUser($_POST);
    exit();
}

if (isset($_GET['action']) && $_GET['action'] === 'deactivate' && isset($_GET['id'])) {
    $controller->confirmDeactivation($_GET['id']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'deactivate') {
    $controller->deactivateUser($_POST);
    exit();
}

if (isset($_GET['id'])) {
    $controller->showProfile($_GET['id']);
    exit();
}

echo "No user selected.";

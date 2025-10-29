<?php
require_once __DIR__ . '/controllers/UserController.php';

$controller = new UserController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->registerUser($_POST);
} else {
    $controller->showRegistrationForm();
}
?>
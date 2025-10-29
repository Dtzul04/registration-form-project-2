<?php
require_once __DIR__ . '/../models/UserModel.php';

class UserController {
    public function registerUser($formData) {
        $errors = [];

        $username = trim($formData['username'] ?? '');
        $password = trim($formData['password'] ?? '');

        if (empty($username)) {
            $errors['username'] = 'Username is required.';
        }

        if (empty($password)) {
            $errors['password'] = 'Password is required.';
        }

        if (!empty($errors)) {
            include __DIR__ . '/../views/profile/create.php';
            return;
        }

        $userId = create_user($username, $password);

        if ($userId) {
            header("Location: profile.php?id=" . $userId);
            exit();
        } else {
            $errors['general'] = "Error creating user. Try again.";
            include __DIR__ . '/../views/profile/create.php';
        }
    }

    public function showRegistrationForm() {
        $errors = [];
        include __DIR__ . '/../views/profile/create.php';
    }
}
?>
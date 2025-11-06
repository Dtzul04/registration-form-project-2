<?php
require_once __DIR__ . '/../models/UserModel.php';

class UserController {
    public function showRegistrationForm() {
        include __DIR__ . '/../views/profile/create.php';
    }

    public function registerUser($data) {
        $username = $data['username'] ?? '';
        $password = $data['password'] ?? '';

        if (empty($username) || empty($password)) {
            die("Please fill in all fields.");
        }

        $userId = create_user($username, $password);
        if ($userId) {
            header("Location: /webdev/Dtzul04/profile.php?id=" . $userId);
            exit();
        } else {
            die("Error creating user.");
        }
    }

    public function confirmDeactivation($id) {
        $user = get_user_by_id($id);
        if (!$user) {
            die("User not found.");
        }
        include __DIR__ . '/../views/profile/deactivate.php';
    }

    public function deactivateUser($formData) {
        $id = $formData['id'] ?? null;
        $confirm = $formData['confirm'] ?? 'no';

        error_log("deactivateUser called with id=$id, confirm=$confirm");

        $user = get_user_by_id($id);
        if (!$user) {
            die("User not found.");
        }

        if ($confirm === 'yes') {
            deactivate_user($id);
            header("Location: /webdev/Dtzul04/register.php");
            exit();
        } else {
            header("Location: /webdev/Dtzul04/profile.php?id=" . $id);
            exit();
        }
    }

    public function editUser($id) {
        $user = get_user_by_id($id);
        if (!$user) {
            die("User not found.");
        }
        include __DIR__ . '/../views/profile/edit.php';
    }

    public function updateUser($data) {
        $id = $data['id'] ?? null;
        $username = $data['username'] ?? '';
        $password = $data['password'] ?? '';

        if (!$id || empty($username) || empty($password)) {
            die("Please fill in all fields.");
        }

        $updated = update_user($id, $username, $password);
        if ($updated) {
            header("Location: /webdev/Dtzul04/profile.php?id=" . $id);
            exit();
        } else {
            die("Error updating user.");
        }
    }

    public function showProfile($id) {
        $user = get_user_by_id($id);
        if (!$user) {
            die("User not found.");
        }
        include __DIR__ . '/../views/profile/show.php';
    }
}

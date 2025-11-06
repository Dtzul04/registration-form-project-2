<?php
$username = $user['username'] ?? ($_POST['username'] ?? '');
$password = ''; 
$errors = $errors ?? [];
?>

<div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input 
        type="text" 
        class="form-control <?= !empty($errors['username']) ? 'is-invalid' : '' ?>" 
        id="username" 
        name="username" 
        value="<?= htmlspecialchars($username) ?>" 
        required
    >
    <?php if (!empty($errors['username'])): ?>
        <div class="invalid-feedback">
            <?= htmlspecialchars($errors['username']) ?>
        </div>
    <?php endif; ?>
</div>

<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input 
        type="password" 
        class="form-control <?= !empty($errors['password']) ? 'is-invalid' : '' ?>" 
        id="password" 
        name="password" 
        value=""
        required
    >
    <?php if (!empty($errors['password'])): ?>
        <div class="invalid-feedback">
            <?= htmlspecialchars($errors['password']) ?>
        </div>
    <?php endif; ?>
</div>

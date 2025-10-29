<?php include __DIR__ . '/../partials/header.php'; ?>

<h2>User Registration</h2>

<?php if (!empty($errors['general'])): ?>
    <p style="color:red;"><?= htmlspecialchars($errors['general']) ?></p>
<?php endif; ?>

<form action="register.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
    <?php if (!empty($errors['username'])): ?>
        <span style="color:red;"><?= htmlspecialchars($errors['username']) ?></span>
    <?php endif; ?>

    <br><br>

    <label for="password">Password:</label>
    <input type="password" name="password">
    <?php if (!empty($errors['password'])): ?>
        <span style="color:red;"><?= htmlspecialchars($errors['password']) ?></span>
    <?php endif; ?>

    <br><br>

    <button type="submit">Register</button>
</form>

<?php include __DIR__ . '/../partials/footer.php'; ?>

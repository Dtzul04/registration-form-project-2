<?php include __DIR__ . '/../partials/header.php'; ?>
<h2>User Profile</h2>

<?php if ($user): ?>
    <table border="1" cellpadding="8">
        <tr><th>Username</th><td><?= htmlspecialchars($user['username']) ?></td></tr>
        <tr><th>Password</th><td><?= htmlspecialchars($user['password']) ?></td></tr>
    </table>
<?php else: ?>
    <p>User not found.</p>
<?php endif; ?>

<a href="register.php">Register another user</a>

<?php include __DIR__ . '/../partials/footer.php'; ?>

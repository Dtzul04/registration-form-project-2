<?php include __DIR__ . '/../partials/header.php'; ?>

<div class="container mt-4">
    <h2 class="mb-3">Deactivate Account</h2>

    <?php if (!empty($user)): ?>
        <p>
            Are you sure you want to deactivate the account for 
            <strong><?= htmlspecialchars($user['username']) ?></strong>?
        </p>

        <form method="POST" action="/webdev/Dtzul04/profile.php">
            <input type="hidden" name="action" value="deactivate">
            <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
            <input type="hidden" name="confirm" value="yes">
            <button type="submit" class="btn btn-danger">Yes, Deactivate</button>
            <a href="/webdev/Dtzul04/profile.php?id=<?= htmlspecialchars($user['id']) ?>" class="btn btn-secondary">Cancel</a>
        </form>

    <?php else: ?>
        <div class="alert alert-warning">User not found.</div>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>

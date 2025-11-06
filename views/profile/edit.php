<?php include __DIR__ . '/../partials/header.php'; ?>

<h2>Edit User Profile</h2>

<?php if (!empty($errors['general'])): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($errors['general']) ?></div>
<?php endif; ?>

<form action="profile.php?id=<?= htmlspecialchars($user['id']) ?>" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
    <input type="hidden" name="action" value="update"> 

    <?php include __DIR__ . '/../partials/form-fields.php'; ?>

    <button type="submit" class="btn btn-primary">Save Changes</button>
    <a href="profile.php?id=<?= htmlspecialchars($user['id']) ?>" class="btn btn-secondary">Cancel</a>
</form>

<?php include __DIR__ . '/../partials/footer.php'; ?>

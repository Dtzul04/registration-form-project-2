<?php include __DIR__ . '/../partials/header.php'; ?>

<div class="container mt-4">
    <h2 class="mb-3">User Registration</h2>

    <?php 
        $user = $user ?? ($_POST ?? []);
        $errors = $errors ?? [];

        if (!empty($errors['general'])): 
    ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($errors['general']) ?>
        </div>
    <?php endif; ?>

    <form action="/webdev/Dtzul04/registration-form-project-2/register.php" method="POST">
        <?php include __DIR__ . '/../partials/form-fields.php'; ?>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>

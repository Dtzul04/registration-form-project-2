<?php include __DIR__ . '/../partials/header.php'; ?>

<h2>User Profile</h2>

<?php if ($user): ?>
    <table border="1" cellpadding="8">
        <tr>
            <th>Username</th>
            <td><?= htmlspecialchars($user['username']) ?></td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <?= $user['active'] ? '<span style="color:green;">Active</span>' : '<span style="color:red;">Deactivated</span>' ?>
            </td>
        </tr>
    </table>

    <br>

    <?php if ($user['active']): ?>
        <a href="/webdev/Dtzul04/profile.php?action=deactivate&id=<?= htmlspecialchars($user['id']) ?>" 
           class="btn btn-danger">
            Deactivate
        </a>
    <?php else: ?>
        <p>This account is deactivated.</p>
    <?php endif; ?>

    <br><br>
    <a href="/webdev/Dtzul04/profile.php?action=edit&id=<?= htmlspecialchars($user['id']) ?>">Edit</a>
    <a href="/webdev/Dtzul04/register.php">Register another user</a>

<?php else: ?>
    <p>User not found.</p>
<?php endif; ?>

<?php include __DIR__ . '/../partials/footer.php'; ?>

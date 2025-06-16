<?php
session_start();
require_once __DIR__ . '/includes/functions.php';
if (is_logged_in()) {
    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($_GET['error'])): ?>
        <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php endif; ?>
    <form action="login.php" method="post">
        <label>Email:
            <input type="email" name="email" required>
        </label><br>
        <label>Password:
            <input type="password" name="password" required>
        </label><br>
        <button type="submit">Login</button>
    </form>
    <p>No account? <a href="signup.php">Sign up</a></p>
</body>
</html>

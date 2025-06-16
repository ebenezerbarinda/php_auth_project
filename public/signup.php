<?php
session_start();
require_once __DIR__ . '/includes/functions.php';
redirect_if_logged_in();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Sign Up</h2>
    <?php if (isset($_GET['error'])): ?>
        <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php endif; ?>
    <form action="register.php" method="post">
        <label>First Name:
            <input type="text" name="first_name" required>
        </label><br>
        <label>Last Name:
            <input type="text" name="last_name" required>
        </label><br>
        <label>Email:
            <input type="email" name="email" required>
        </label><br>
        <label>Password:
            <input type="password" name="password" required>
        </label><br>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="index.php">Login</a></p>
</body>
</html>

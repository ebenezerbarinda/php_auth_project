<?php
session_start();
require_once __DIR__ . '/includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'] ?? '';
    $last_name  = $_POST['last_name'] ?? '';
    $email      = $_POST['email'] ?? '';
    $password   = $_POST['password'] ?? '';

    // Basic validation
    if (!$first_name || !$last_name || !$email || !$password) {
        header('Location: signup.php?error=Please fill in all fields');
        exit();
    }

    // Check if email exists
    $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ?');
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        header('Location: signup.php?error=Email already registered');
        exit();
    }

    // Insert new user
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare('INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)');
    $stmt->execute([$first_name, $last_name, $email, $hashed_password]);

    header('Location: index.php');
    exit();
}
?>

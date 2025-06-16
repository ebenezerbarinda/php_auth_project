<?php
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function redirect_if_logged_in() {
    if (is_logged_in()) {
        header('Location: dashboard.php');
        exit();
    }
}

function redirect_if_not_logged_in() {
    if (!is_logged_in()) {
        header('Location: index.php');
        exit();
    }
}
?>

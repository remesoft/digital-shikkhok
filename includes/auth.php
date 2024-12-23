<?php
// Start a session (if not already started)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Logout function
function logout() {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}

// Check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Require login for restricted pages
function requireLogin() {
    if (!isLoggedIn()) {
        header("Location: login.php");
        exit();
    }
}
?>

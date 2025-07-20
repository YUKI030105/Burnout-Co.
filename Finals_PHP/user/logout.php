<?php
session_start();
require_once '../includes/db_connection.php';

// Unset all session variables
$_SESSION = array();

// Delete session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy the session
session_destroy();

// Delete remember me cookie and token
if (isset($_COOKIE['remember_token'])) {
    setcookie('remember_token', '', time() - 3600, '/');
    
    // Clear token from database if exists
    $token = $_COOKIE['remember_token'];
    $stmt = $pdo->prepare("UPDATE users SET remember_token = NULL, remember_expiry = NULL WHERE remember_token = ?");
    $stmt->execute([$token]);
}

// Redirect to login page
header("Location: login.php");
exit;
?>
<?php
session_start();
require_once '../includes/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? true : false;

    // Validate inputs
    $errors = [];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (empty($password)) {
        $errors[] = "Password is required";
    }

    if (empty($errors)) {
        // Check if user exists
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Check if account is verified
                if (!$user['is_verified']) {
                    header("Location: login.php?error=Your account is not verified. Please check your email for verification link.");
                    exit;
                }
                
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];
                
                // Set remember me cookie if selected
                if ($remember) {
                    $token = bin2hex(random_bytes(32));
                    $expiry = time() + 60 * 60 * 24 * 30; // 30 days
                    
                    // Store token in database
                    $stmt = $pdo->prepare("UPDATE users SET remember_token = ?, remember_expiry = ? WHERE id = ?");
                    $stmt->execute([$token, date('Y-m-d H:i:s', $expiry), $user['id']]);
                    
                    // Set cookie
                    setcookie('remember_token', $token, $expiry, '/');
                }
                
                // Redirect to dashboard or previous page
                header("Location: ../user/account.php");
                exit;
            } else {
                $errors[] = "Invalid email or password";
            }
        } else {
            $errors[] = "Invalid email or password";
        }
    }
    
    // If there were errors, redirect back with messages
    header("Location: login.php?error=" . urlencode(implode("<br>", $errors)));
    exit;
} else {
    header("Location: login.php");
    exit;
}
?>
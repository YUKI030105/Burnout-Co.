<?php
require_once '../includes/db_connection.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    
    // Check if token exists and is not expired
    $stmt = $pdo->prepare("SELECT id, verification_expiry FROM users WHERE verification_token = ? AND is_verified = 0");
    $stmt->execute([$token]);
    $user = $stmt->fetch();
    
    if ($user) {
        $now = date('Y-m-d H:i:s');
        if ($now <= $user['verification_expiry']) {
            // Mark user as verified
            $updateStmt = $pdo->prepare("UPDATE users SET is_verified = 1, verification_token = NULL, verification_expiry = NULL WHERE id = ?");
            $updateStmt->execute([$user['id']]);
            
            $message = "Email verified successfully! You can now login to your account.";
        } else {
            $message = "Verification link has expired. Please register again.";
        }
    } else {
        $message = "Invalid verification link.";
    }
} else {
    $message = "No verification token provided.";
}

header("Location: ../index.php?verification_message=" . urlencode($message));
?>
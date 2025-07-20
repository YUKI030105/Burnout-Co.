<?php
require_once '../includes/db_connection.php';
require_once '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $address = trim($_POST['address']);
    $contactNumber = trim($_POST['contact_number']);

    // Validate inputs
    $errors = [];

    if (empty($firstName) || empty($lastName)) {
        $errors[] = "First name and last name are required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }

    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    if (empty($address)) {
        $errors[] = "Address is required.";
    }

    if (empty($contactNumber)) {
        $errors[] = "Contact number is required.";
    }

    // Check if email already exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        $errors[] = "Email already registered.";
    }

    if (empty($errors)) {
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Generate verification token
        $verificationToken = bin2hex(random_bytes(32));
        $verificationExpiry = date('Y-m-d H:i:s', strtotime('+24 hours'));

        // Insert user into database
        $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password, address, contact_number, verification_token, verification_expiry, is_verified) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 0)");
        
        if ($stmt->execute([$firstName, $lastName, $email, $hashedPassword, $address, $contactNumber, $verificationToken, $verificationExpiry])) {
            // Send verification email
            $verificationLink = "http://" . $_SERVER['HTTP_HOST'] . "/burnout-co/user/verify_email.php?token=$verificationToken";
            
            $subject = "Verify Your Burnout Co. Account";
            $message = include '../includes/email_template.php';
            $message = str_replace('{{verification_link}}', $verificationLink, $message);
            $message = str_replace('{{first_name}}', $firstName, $message);
            
            $headers = "From: no-reply@burnoutco.com\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            
            if (mail($email, $subject, $message, $headers)) {
                header("Location: register.php?success=Registration successful! Please check your email to verify your account.");
            } else {
                header("Location: register.php?error=Failed to send verification email. Please contact support.");
            }
        } else {
            header("Location: register.php?error=Registration failed. Please try again.");
        }
    } else {
        $errorString = implode("<br>", $errors);
        header("Location: register.php?error=" . urlencode($errorString));
    }
} else {
    header("Location: register.php");
}
?>
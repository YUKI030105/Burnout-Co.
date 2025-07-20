<?php
session_start();
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]".str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

$pageTitle = "Login - Burnout Co.";
include '../includes/header.php';
?>

<link rel="stylesheet" href="<?php echo $base_url; ?>../assets/css/login.css">

<div class="login-container">
    <div class="login-form">
        <div class="login-logo">
            <img src="<?php echo $base_url; ?>/assets/images/logo/burnout-logo.png" alt="Burnout Co. Logo">
            <h2>Login to Your Account</h2>
        </div>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>
        
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($_GET['success']); ?></div>
        <?php endif; ?>

        <form action="process_login.php" method="POST">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-field">
                    <input type="password" id="password" name="password" required>
                    <div class="password-toggle">
                        <i class="fas fa-eye"></i>
                    </div>
                </div>
            </div>

            <div class="form-options">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <a href="forgot_password.php" class="forgot-password">Forgot Password?</a>
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>

        <div class="login-footer">
            <p>Don't have an account? <a href="register.php">Create Account</a></p>
            <p>or continue with</p>
            <div class="social-login">
                <a href="#" class="social-btn google"><i class="fab fa-google"></i> Google</a>
                <a href="#" class="social-btn facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
            </div>
        </div>
    </div>
</div>

<script>
// Password toggle visibility
document.querySelector('.password-toggle').addEventListener('click', function() {
    const passwordInput = document.getElementById('password');
    const icon = this.querySelector('i');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
});
</script>

<?php include '../includes/footer.php'; ?>
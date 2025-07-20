<?php
// Start session if not already started
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Auto-login with remember token
if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_token'])) {
    require_once 'db_connection.php';
    
    $token = $_COOKIE['remember_token'];
    $current_time = date('Y-m-d H:i:s');
    
    $stmt = $pdo->prepare("SELECT * FROM users WHERE remember_token = ? AND remember_expiry > ?");
    $stmt->execute([$token, $current_time]);
    $user = $stmt->fetch();
    
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
    }
}

// Set base URL dynamically
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]".str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Burnout Co. - Racing Inspired Apparel'; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="icon" href="../assets/images/logo/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../assets/images/logo/favicon.ico" type="image/x-icon">
</head>
<body>
    <!-- Top Announcement Bar -->
    <div class="announcement-bar">
        <p>Free shipping on orders over $50 | Use code: BURNOUT10 for 10% off</p>
    </div>

    <!-- Main Header -->
    <header class="main-header">
        <div class="header-container">
            <!-- Logo -->
            <div class="logo-container">
                <a href="/burnout-co/index.php">
                    <img src="../assets/images/auth/logo_nav.png" alt="Burnout Co. Logo" class="logo">
                </a>
            </div>

            <!-- Navigation -->
            <nav class="main-nav">
                <ul>
                    <li><a href="/FINALS_PHP/index.php">Home</a></li>
                    <li><a href="/FINALS_PHP/products/shop.php">Shop</a></li>
                    <li><a href="/FINALS_PHP/about.php">About</a></li>
                    <li><a href="/FINALS_PHP/contact.php">Contact</a></li>
                </ul>
            </nav>

            <!-- User Actions -->
            <div class="user-actions">
                <div class="search-container">
                    <form action="/burnout-co/products/store.php" method="GET">
                        <input type="text" name="search" placeholder="Search..." class="search-input">
                        <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
                    </form>
                </div>
                
                <div class="account-cart">
                    <?php if (isset($_SESSION['user_id'])): ?>
                <div class="user-dropdown">
                <button class="user-dropbtn">
                    <i class="fas fa-user"></i>
                    <span class="user-name"><?php echo htmlspecialchars($_SESSION['first_name']); ?></span>
                </button>
                <div class="user-dropdown-content">
                    <a href="<?php echo $base_url; ?>/user/account.php">My Account</a>
                    <a href="<?php echo $base_url; ?>/user/logout.php">Logout</a>
                    </div>
                </div>
                    <?php else: ?>
                        <a href="<?php echo $base_url; ?>/user/login.php" class="account-link"><i class="fas fa-user"></i></a>
                    <?php endif; ?>
                
                    <a href="<?php echo $base_url; ?>../cart/cart.php" class="cart-link">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-count">
                            <?php 
                            echo isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0;
                            ?>
                        </span>
                    </a>
                </div>
            </div>

            <!-- Mobile Menu Button -->
            <button class="mobile-menu-button" aria-label="Toggle menu">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <nav class="mobile-nav">
            <ul>
                <li><a href="/burnout-co/index.php">Home</a></li>
                <li><a href="/burnout-co/products/store.php">Shop</a></li>
                <li><a href="/burnout-co/about.php">About</a></li>
                <li><a href="/burnout-co/contact.php">Contact</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="/burnout-co/user/account.php">My Account</a></li>
                    <li><a href="/burnout-co/user/logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="/burnout-co/user/login.php">Login</a></li>
                    <li><a href="/burnout-co/user/register.php">Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
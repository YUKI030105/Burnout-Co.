<?php
session_start();
require_once '../includes/db_connection.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]".str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

$pageTitle = "My Account - Burnout Co.";
include '../includes/header.php';

// Get user details
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
?>

<div class="account-container">
    <div class="account-sidebar">
        <div class="account-profile">
            <div class="profile-image">
                <i class="fas fa-user"></i>
            </div>
            <h3><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></h3>
            <p><?php echo htmlspecialchars($user['email']); ?></p>
        </div>
        
        <ul class="account-menu">
            <li class="active"><a href="#"><i class="fas fa-user"></i> Account Overview</a></li>
            <li><a href="#"><i class="fas fa-shopping-bag"></i> Orders</a></li>
            <li><a href="#"><i class="fas fa-map-marker-alt"></i> Addresses</a></li>
            <li><a href="#"><i class="fas fa-lock"></i> Change Password</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>
    
    <div class="account-content">
        <h2>Account Overview</h2>
        
        <div class="account-details">
            <h3>Personal Information</h3>
            <div class="detail-row">
                <span>Full Name</span>
                <span><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></span>
            </div>
            <div class="detail-row">
                <span>Email</span>
                <span><?php echo htmlspecialchars($user['email']); ?></span>
            </div>
            <div class="detail-row">
                <span>Contact Number</span>
                <span><?php echo htmlspecialchars($user['contact_number'] ?? 'Not provided'); ?></span>
            </div>
            <a href="#" class="edit-btn">Edit Information</a>
        </div>
        
        <div class="account-details">
            <h3>Default Address</h3>
            <p><?php echo nl2br(htmlspecialchars($user['address'])); ?></p>
            <a href="#" class="edit-btn">Manage Addresses</a>
        </div>
        
        <div class="account-orders">
            <h3>Recent Orders</h3>
            <table>
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Date</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5" class="no-orders">You haven't placed any orders yet.</td>
                    </tr>
                </tbody>
            </table>
            <a href="#" class="view-all">View Order History</a>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
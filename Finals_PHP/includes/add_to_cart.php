<?php
session_start();

// Calculate base URL dynamically
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
$script_path = dirname(dirname($_SERVER['SCRIPT_NAME'])); // Go up two levels
$base_url .= rtrim($script_path, '/');

require_once __DIR__ . '/db_connection.php';

// Rest of your cart code...


// Headers
header('Content-Type: text/plain');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get raw POST data
    $postData = file_get_contents('php://input');
    parse_str($postData, $data);
    
    $product_id = filter_var($data['product_id'] ?? 0, FILTER_VALIDATE_INT);
    
    if ($product_id) {
        // Initialize cart if it doesn't exist
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        
        // Add product to cart or increment quantity
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]++;
        } else {
            $_SESSION['cart'][$product_id] = 1;
        }
        
        // Return the updated cart count
        echo array_sum($_SESSION['cart']);
        exit;
    }
}

// Default response if something goes wrong
echo '0';

?>
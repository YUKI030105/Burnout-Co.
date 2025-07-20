<?php
session_start();
require_once '../includes/db_connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    
    $response = ['success' => false];
    
    if ($product_id && isset($_SESSION['cart'][$product_id])) {
        switch ($action) {
            case 'increase':
                $_SESSION['cart'][$product_id]++;
                $response = [
                    'success' => true,
                    'new_quantity' => $_SESSION['cart'][$product_id],
                    'cart_count' => array_sum($_SESSION['cart'])
                ];
                break;
                
            case 'decrease':
                if ($_SESSION['cart'][$product_id] > 1) {
                    $_SESSION['cart'][$product_id]--;
                    $response = [
                        'success' => true,
                        'new_quantity' => $_SESSION['cart'][$product_id],
                        'cart_count' => array_sum($_SESSION['cart'])
                    ];
                } else {
                    // If quantity would go to 0, remove the item
                    unset($_SESSION['cart'][$product_id]);
                    $response = [
                        'success' => true,
                        'new_quantity' => 0,
                        'cart_count' => array_sum($_SESSION['cart'])
                    ];
                }
                break;
                
            case 'remove':
                unset($_SESSION['cart'][$product_id]);
                $response = [
                    'success' => true,
                    'new_quantity' => 0,
                    'cart_count' => array_sum($_SESSION['cart'])
                ];
                break;
        }
    }
    
    echo json_encode($response);
} else {
    echo json_encode(['success' => false]);
}
?>
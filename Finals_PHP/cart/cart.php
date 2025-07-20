<?php
session_start();
require_once '../includes/db_connection.php'; // Database connection file

$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]".str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

$pageTitle = "Your Cart - Burnout Co.";
include '../includes/header.php';
?>

<div class="cart-container">
    <h1>Your Shopping Cart</h1>
    
    <?php if (empty($_SESSION['cart'])): ?>
        <p>Your cart is empty</p>
    <?php else: ?>
        <div class="cart-items">
            <?php 
            // Fetch product details from database
            $product_ids = array_keys($_SESSION['cart']);
            $placeholders = implode(',', array_fill(0, count($product_ids), '?'));
            
            $stmt = $pdo->prepare("SELECT * FROM products WHERE id IN ($placeholders)");
            $stmt->execute($product_ids);
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // Create an array with product_id as key for easy access
            $product_details = [];
            foreach ($products as $product) {
                $product_details[$product['id']] = $product;
            }
            
            $total = 0;
            
            foreach ($_SESSION['cart'] as $id => $quantity):
                if (!isset($product_details[$id])) continue; // Skip if product not found
                $product = $product_details[$id];
                $subtotal = $product['price'] * $quantity;
                $total += $subtotal;
            ?>
            <div class="cart-item">
                <img src="<?php echo $base_url; ?>/assets/images/products/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                <div class="cart-item-details">
                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                    <p>$<?php echo number_format($product['price'], 2); ?></p>
                    <div class="quantity-controls">
                        <button class="quantity-btn" data-action="decrease" data-product-id="<?php echo $id; ?>">-</button>
                        <span class="quantity"><?php echo $quantity; ?></span>
                        <button class="quantity-btn" data-action="increase" data-product-id="<?php echo $id; ?>">+</button>
                        <button class="remove-btn" data-product-id="<?php echo $id; ?>">Remove</button>
                    </div>
                </div>
                <div class="cart-item-subtotal">
                    $<?php echo number_format($subtotal, 2); ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="cart-total">
            <h3>Total: $<?php echo number_format($total, 2); ?></h3>
            <a href="<?php echo $base_url; ?>/checkout.php" class="checkout-btn">Proceed to Checkout</a>
        </div>
    <?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Quantity controls
    document.querySelectorAll('.quantity-btn').forEach(button => {
        button.addEventListener('click', function() {
            const action = this.getAttribute('data-action');
            const productId = this.getAttribute('data-product-id');
            
            fetch('<?php echo $base_url; ?>/includes/update_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=${action}&product_id=${productId}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the quantity display
                    const quantityElement = this.parentElement.querySelector('.quantity');
                    quantityElement.textContent = data.new_quantity;
                    
                    // Update subtotal if needed
                    if (action !== 'remove') {
                        const price = parseFloat(this.closest('.cart-item-details').querySelector('p').textContent.replace('$', ''));
                        const subtotal = price * data.new_quantity;
                        this.closest('.cart-item').querySelector('.cart-item-subtotal').textContent = '$' + subtotal.toFixed(2);
                        
                        // Update total
                        let newTotal = 0;
                        document.querySelectorAll('.cart-item-subtotal').forEach(el => {
                            newTotal += parseFloat(el.textContent.replace('$', ''));
                        });
                        document.querySelector('.cart-total h3').textContent = 'Total: $' + newTotal.toFixed(2);
                    } else {
                        // Remove the item from the DOM if action was remove
                        this.closest('.cart-item').remove();
                        
                        // Update total
                        let newTotal = 0;
                        document.querySelectorAll('.cart-item-subtotal').forEach(el => {
                            newTotal += parseFloat(el.textContent.replace('$', ''));
                        });
                        document.querySelector('.cart-total h3').textContent = 'Total: $' + newTotal.toFixed(2);
                        
                        // If cart is empty now, show empty message
                        if (document.querySelectorAll('.cart-item').length === 0) {
                            document.querySelector('.cart-items').innerHTML = '<p>Your cart is empty</p>';
                        }
                    }
                    
                    // Update cart counter in header
                    document.querySelector('.cart-count').textContent = data.cart_count;
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
    
    // Remove buttons
    document.querySelectorAll('.remove-btn').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            
            fetch('<?php echo $base_url; ?>/includes/update_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `action=remove&product_id=${productId}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Remove the item from the DOM
                    this.closest('.cart-item').remove();
                    
                    // Update total
                    let newTotal = 0;
                    document.querySelectorAll('.cart-item-subtotal').forEach(el => {
                        newTotal += parseFloat(el.textContent.replace('$', ''));
                    });
                    document.querySelector('.cart-total h3').textContent = 'Total: $' + newTotal.toFixed(2);
                    
                    // Update cart counter in header
                    document.querySelector('.cart-count').textContent = data.cart_count;
                    
                    // If cart is empty now, show empty message
                    if (document.querySelectorAll('.cart-item').length === 0) {
                        document.querySelector('.cart-items').innerHTML = '<p>Your cart is empty</p>';
                    }
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
</script>

<?php include '../includes/footer.php'; ?>
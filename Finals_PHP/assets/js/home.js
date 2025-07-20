document.addEventListener('DOMContentLoaded', function() {
    // Add to Cart functionality
    const addToCartButtons = document.querySelectorAll('.home-add-to-cart');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            
            fetch('<?php echo $base_url; ?>/includes/add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'product_id=' + productId
            })
            .then(response => response.text())
            .then(count => {
                // Update cart counter
                document.querySelector('.cart-count').textContent = count;
                
                // Visual feedback
                const originalText = this.textContent;
                this.textContent = 'Added!';
                this.style.backgroundColor = '#4CAF50';
                
                setTimeout(() => {
                    this.textContent = originalText;
                    this.style.backgroundColor = '#333';
                }, 2000);
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
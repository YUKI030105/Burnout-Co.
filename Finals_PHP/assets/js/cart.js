document.addEventListener('DOMContentLoaded', function() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart, .home-add-to-cart');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            const button = this;
            
            fetch('<?php echo $base_url; ?>/includes/add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'product_id=' + productId
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(count => {
                // Update cart counter
                document.querySelectorAll('.cart-count').forEach(el => {
                    el.textContent = count;
                });
                
                // Visual feedback
                const originalText = button.textContent;
                button.textContent = 'Added!';
                button.style.backgroundColor = '#4CAF50';
                
                setTimeout(() => {
                    button.textContent = originalText;
                    button.style.backgroundColor = '';
                }, 2000);
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to add item to cart. Please try again.');
            });
        });
    });
});
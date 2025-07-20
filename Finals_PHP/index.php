<?php 
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set base URL dynamically
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]".str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

$pageTitle = "Burnout Co. - Premium Racing Apparel";
include 'includes/header_index.php'; 
?>

<link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/home.css">

<main class="homepage-main">
    <!-- Hero Section -->
    <section class="home-hero">
        <div class="home-hero-content">
            <h1 class="home-hero-title">Fuel by Fashion <br> Designed to Race</h1> 
            <p class="home-hero-subtitle">High-performance apparel for those who live life in the fast lane</p>
            <a href="<?php echo $base_url; ?>/products/store.php" class="home-cta-button">Shop Now</a>
        </div>
        <div class="home-hero-scroll-indicator">
            <span>Scroll Down</span>
            <i class="fas fa-chevron-down"></i>
        </div>
    </section>

    <!-- Featured Categories -->
    <section class="home-categories">
        <div class="home-section-header">
            <h2 class="home-section-title">Shop By Category</h2>
            <p class="home-section-subtitle">Find your perfect gear</p>
        </div>
        <div class="home-category-grid">
            <a href="<?php echo $base_url; ?>/products/store.php?category=tshirts" class="home-category-card">
                <div class="home-category-image" style="background-image: url('<?php echo $base_url; ?>/assets/images/product/tshirt1.jpg');"></div>
                <h3 class="home-category-title">T-Shirts</h3>
            </a>
            <a href="<?php echo $base_url; ?>/products/store.php?category=jackets" class="home-category-card">
                <div class="home-category-image" style="background-image: url('<?php echo $base_url; ?>/assets/images/product/hoodie1.jpg');"></div>
                <h3 class="home-category-title">Jackets</h3>
            </a>
            <a href="<?php echo $base_url; ?>/products/store.php?category=caps" class="home-category-card">
                <div class="home-category-image" style="background-image: url('<?php echo $base_url; ?>/assets/images/product/cap1.jpg');"></div>
                <h3 class="home-category-title">Caps</h3>
            </a>
            <a href="<?php echo $base_url; ?>/products/store.php?category=perfumes" class="home-category-card">
                <div class="home-category-image" style="background-image: url('<?php echo $base_url; ?>/assets/images/product/perfume1.jpg');"></div>
                <h3 class="home-category-title">Perfumes</h3>
            </a>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="home-products">
        <div class="home-section-header">
            <h2 class="home-section-title">Featured Products</h2>
            <p class="home-section-subtitle">Best sellers this month</p>
        </div>
        <div class="home-product-grid">
            <!-- Product 1 -->
            <div class="home-product-card">
                <div class="home-product-badge">Hot Item</div>
                <div class="home-product-image" style="background-image: url('<?php echo $base_url; ?>/assets/images/product/tshirt2.jpg');">
                    <div class="home-product-actions">
                        <button class="home-quick-view" data-product="1">Quick View</button>
                        <button class="home-wishlist-btn"><i class="far fa-heart"></i></button>
                    </div>
                </div>
                <div class="home-product-info">
                    <h3 class="home-product-name">Turbocharged Tee</h3>
                    <div class="home-product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>(24)</span>
                    </div>
                    <div class="home-product-price">
                        <span class="home-current-price">$29.99</span>
                        <span class="home-original-price">$39.99</span>
                    </div>
                    <button class="home-add-to-cart" data-product-id="1">Add to Cart</button>
                </div>
            </div>
            
            <!-- Product 2 -->
            <div class="home-product-card">
                <div class="home-product-image" style="background-image: url('<?php echo $base_url; ?>/assets/images/product/hoodie2.jpg');">
                    <div class="home-product-actions">
                        <button class="home-quick-view" data-product="2">Quick View</button>
                        <button class="home-wishlist-btn"><i class="far fa-heart"></i></button>
                    </div>
                </div>
                <div class="home-product-info">
                    <h3 class="home-product-name">Racing Line Jacket</h3>
                    <div class="home-product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <span>(18)</span>
                    </div>
                    <div class="home-product-price">
                        <span class="home-current-price">$89.99</span>
                    </div>
                    <button class="home-add-to-cart" data-product-id="2">Add to Cart</button>
                </div>
            </div>
            
            <!-- Product 3 -->
            <div class="home-product-card">
                <div class="home-product-badge">New</div>
                <div class="home-product-image" style="background-image: url('<?php echo $base_url; ?>/assets/images/product/cap2.jpg');">
                    <div class="home-product-actions">
                        <button class="home-quick-view" data-product="3">Quick View</button>
                        <button class="home-wishlist-btn"><i class="far fa-heart"></i></button>
                    </div>
                </div>
                <div class="home-product-info">
                    <h3 class="home-product-name">Checkered Flag Cap</h3>
                    <div class="home-product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>(32)</span>
                    </div>
                    <div class="home-product-price">
                        <span class="home-current-price">$24.99</span>
                    </div>
                    <button class="home-add-to-cart" data-product-id="3">Add to Cart</button>
                </div>
            </div>
            
            <!-- Product 4 -->
            <div class="home-product-card">
                <div class="home-product-image" style="background-image: url('<?php echo $base_url; ?>/assets/images/product/perfume2.jpg');">
                    <div class="home-product-actions">
                        <button class="home-quick-view" data-product="4">Quick View</button>
                        <button class="home-wishlist-btn"><i class="far fa-heart"></i></button>
                    </div>
                </div>
                <div class="home-product-info">
                    <h3 class="home-product-name">Pit Stop Fragrance</h3>
                    <div class="home-product-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>(15)</span>
                    </div>
                    <div class="home-product-price">
                        <span class="home-current-price">$49.99</span>
                        <span class="home-original-price">$59.99</span>
                    </div>
                    <button class="home-add-to-cart" data-product-id="4">Add to Cart</button>
                </div>
            </div>
        </div>
        <div class="home-section-footer">
            <a href="<?php echo $base_url; ?>/products/store.php" class="home-view-all">View All Products →</a>
        </div>
    </section>

    <!-- Racing Banner -->
    <section class="home-racing-banner">
        <div class="home-banner-content">
            <h2>Born on the Track</h2>
            <p>Our designs are inspired by the raw power and adrenaline of motorsports</p>
            <a href="<?php echo $base_url; ?>/about.php" class="home-cta-button-outline">Our Story</a>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="home-testimonials">
        <div class="home-section-header">
            <h2 class="home-section-title">Racer Approved</h2>
            <p class="home-section-subtitle">What our customers say</p>
        </div>
        <div class="home-testimonial-slider">
            <!-- Testimonial 1 -->
            <div class="home-testimonial-card">
                <div class="home-testimonial-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="home-testimonial-text">"The quality of Burnout Co. apparel is unmatched. I wear their shirts to every race weekend!"</p>
                <div class="home-testimonial-author">
                    <img src="<?php echo $base_url; ?>/assets/images/testimonials/driver1.jpg" alt="Alex Rivera">
                    <div>
                        <h4>Alex Rivera</h4>
                        <span>Professional Racer</span>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 2 -->
            <div class="home-testimonial-card">
                <div class="home-testimonial-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <p class="home-testimonial-text">"Finally found a brand that understands car culture. Their designs speak to true enthusiasts."</p>
                <div class="home-testimonial-author">
                    <img src="<?php echo $base_url; ?>/assets/images/testimonials/driver2.jpg" alt="Sarah Chen">
                    <div>
                        <h4>Sarah Chen</h4>
                        <span>Car Collector</span>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial 3 -->
            <div class="home-testimonial-card">
                <div class="home-testimonial-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p class="home-testimonial-text">"The Pit Stop Fragrance is my new signature scent. Gets compliments everywhere I go!"</p>
                <div class="home-testimonial-author">
                    <img src="<?php echo $base_url; ?>/assets/images/testimonials/driver3.jpg" alt="Marcus Johnson">
                    <div>
                        <h4>Marcus Johnson</h4>
                        <span>Auto Journalist</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="home-newsletter">
        <div class="home-newsletter-container">
            <div class="home-newsletter-content">
                <h2>Stay in the Loop</h2>
                <p>Subscribe for exclusive deals, new releases, and racing content</p>
                <form class="home-newsletter-form">
                    <input type="email" placeholder="Your email address" required>
                    <button type="submit">Subscribe</button>
                </form>
                <p class="home-disclaimer">We'll never share your email. Unsubscribe anytime.</p>
            </div>
            <div class="home-newsletter-image">
                <img src="<?php echo $base_url; ?>/assets/images/homepage/newsletter.png" alt="Burnout Co. Newsletter">
            </div>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add to Cart functionality
    const addToCartButtons = document.querySelectorAll('.home-add-to-cart');
    
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
            .then(response => response.text())
            .then(count => {
                // Update cart counter
                document.querySelector('.cart-count').textContent = count;
                
                // Visual feedback
                const originalText = button.textContent;
                button.textContent = 'Added!';
                button.style.backgroundColor = '#4CAF50';
                
                setTimeout(() => {
                    button.textContent = originalText;
                    button.style.backgroundColor = '#333';
                }, 2000);
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?>
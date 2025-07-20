<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set base URL dynamically
$base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]".str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

$pageTitle = "Shop - Burnout Co.";
include '../includes/header.php'; 
?>

<link rel="stylesheet" href="<?php echo $base_url; ?>../assets/css/shop.css">

<main class="shop-main">
    <!-- Shop Hero Banner -->
    <section class="shop-hero">
        <div class="shop-hero-content">
            <h1>Burnout Co. Shop</h1>
            <p>Premium Racing Apparel & Accessories</p>
        </div>
    </section>

    <!-- Shop Content -->
    <section class="shop-container">
        <div class="shop-sidebar">
            <div class="shop-widget">
                <h3>Categories</h3>
                <ul class="shop-categories">
                    <li class="active"><a href="<?php echo $base_url; ?>/products/shop.php">All Products</a></li>
                    <li><a href="<?php echo $base_url; ?>/products/shop.php?category=tshirts">T-Shirts</a></li>
                    <li><a href="<?php echo $base_url; ?>/products/shop.php?category=jackets">Jackets</a></li>
                    <li><a href="<?php echo $base_url; ?>/products/shop.php?category=caps">Caps</a></li>
                    <li><a href="<?php echo $base_url; ?>/products/shop.php?category=perfumes">Perfumes</a></li>
                </ul>
            </div>
            
            <div class="shop-widget">
                <h3>Filter By Price</h3>
                <div class="price-filter">
                    <div id="price-slider"></div>
                    <div class="price-values">
                        <span>$0</span>
                        <span>$200</span>
                    </div>
                    <button class="filter-btn">Apply Filter</button>
                </div>
            </div>
            
            <div class="shop-widget">
                <h3>Collections</h3>
                <ul class="shop-collections">
                    <li><a href="<?php echo $base_url; ?>/products/shop.php?collection=new">New Arrivals</a></li>
                    <li><a href="<?php echo $base_url; ?>/products/shop.php?collection=bestsellers">Best Sellers</a></li>
                    <li><a href="<?php echo $base_url; ?>/products/shop.php?collection=summer">Summer Collection</a></li>
                </ul>
            </div>
            
            <div class="shop-widget">
                <h3>Featured Products</h3>
                <div class="featured-product">
                    <img src="<?php echo $base_url; ?>/assets/images/product/tshirt2.jpg" alt="Turbocharged Tee">
                    <div>
                        <h4>Turbocharged Tee</h4>
                        <div class="price">$29.99</div>
                    </div>
                </div>
                <div class="featured-product">
                    <img src="<?php echo $base_url; ?>/assets/images/product/cap2.jpg" alt="Checkered Flag Cap">
                    <div>
                        <h4>Checkered Flag Cap</h4>
                        <div class="price">$24.99</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="shop-content">
            <div class="shop-header">
                <div class="results-sort">
                    <p>Showing 1-8 of 8 products</p>
                    <div class="sort-options">
                        <label for="sort">Sort by:</label>
                        <select id="sort">
                            <option value="default">Default</option>
                            <option value="price-low">Price: Low to High</option>
                            <option value="price-high">Price: High to Low</option>
                            <option value="popularity">Popularity</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="product-grid">
                <!-- Product 1 -->
                <div class="product-card">
                    <div class="product-badge">Hot Item</div>
                    <div class="product-image">
                        <img src="<?php echo $base_url; ?>/assets/images/product/tshirt1.jpg" alt="Turbocharged Tee">
                        <div class="product-actions">
                            <button class="quick-view" data-product="1">Quick View</button>
                            <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Turbocharged Tee</h3>
                        <div class="product-category">T-Shirts</div>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>(24)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">$29.99</span>
                            <span class="original-price">$39.99</span>
                        </div>
                        <button class="add-to-cart" data-product-id="1">Add to Cart</button>
                    </div>
                </div>
                
                <!-- Product 2 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?php echo $base_url; ?>/assets/images/product/jacket1.jpg" alt="Racing Line Jacket">
                        <div class="product-actions">
                            <button class="quick-view" data-product="2">Quick View</button>
                            <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Racing Line Jacket</h3>
                        <div class="product-category">Jackets</div>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>(18)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">$89.99</span>
                        </div>
                        <button class="add-to-cart" data-product-id="2">Add to Cart</button>
                    </div>
                </div>
                
                <!-- Product 3 -->
                <div class="product-card">
                    <div class="product-badge">New</div>
                    <div class="product-image">
                        <img src="<?php echo $base_url; ?>/assets/images/product/cap1.jpg" alt="Checkered Flag Cap">
                        <div class="product-actions">
                            <button class="quick-view" data-product="3">Quick View</button>
                            <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Checkered Flag Cap</h3>
                        <div class="product-category">Caps</div>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>(32)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">$24.99</span>
                        </div>
                        <button class="add-to-cart" data-product-id="3">Add to Cart</button>
                    </div>
                </div>
                
                <!-- Product 4 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?php echo $base_url; ?>/assets/images/product/perfume1.jpg" alt="Pit Stop Fragrance">
                        <div class="product-actions">
                            <button class="quick-view" data-product="4">Quick View</button>
                            <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Pit Stop Fragrance</h3>
                        <div class="product-category">Perfumes</div>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>(15)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">$49.99</span>
                            <span class="original-price">$59.99</span>
                        </div>
                        <button class="add-to-cart" data-product-id="4">Add to Cart</button>
                    </div>
                </div>
                
                <!-- Product 5 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?php echo $base_url; ?>/assets/images/product/tshirt3.jpg" alt="Gear Shift Tee">
                        <div class="product-actions">
                            <button class="quick-view" data-product="5">Quick View</button>
                            <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Gear Shift Tee</h3>
                        <div class="product-category">T-Shirts</div>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>(27)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">$27.99</span>
                        </div>
                        <button class="add-to-cart" data-product-id="5">Add to Cart</button>
                    </div>
                </div>
                
                <!-- Product 6 -->
                <div class="product-card">
                    <div class="product-badge">Sale</div>
                    <div class="product-image">
                        <img src="<?php echo $base_url; ?>/assets/images/product/jacket2.jpg" alt="Track Day Hoodie">
                        <div class="product-actions">
                            <button class="quick-view" data-product="6">Quick View</button>
                            <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Track Day Hoodie</h3>
                        <div class="product-category">Jackets</div>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <span>(14)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">$64.99</span>
                            <span class="original-price">$79.99</span>
                        </div>
                        <button class="add-to-cart" data-product-id="6">Add to Cart</button>
                    </div>
                </div>
                
                <!-- Product 7 -->
                <div class="product-card">
                    <div class="product-image">
                        <img src="<?php echo $base_url; ?>/assets/images/product/cap3.jpg" alt="Racing Stripes Cap">
                        <div class="product-actions">
                            <button class="quick-view" data-product="7">Quick View</button>
                            <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Racing Stripes Cap</h3>
                        <div class="product-category">Caps</div>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span>(19)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">$26.99</span>
                        </div>
                        <button class="add-to-cart" data-product-id="7">Add to Cart</button>
                    </div>
                </div>
                
                <!-- Product 8 -->
                <div class="product-card">
                    <div class="product-badge">Limited</div>
                    <div class="product-image">
                        <img src="<?php echo $base_url; ?>/assets/images/product/perfume3.jpg" alt="Leather & Gasoline">
                        <div class="product-actions">
                            <button class="quick-view" data-product="8">Quick View</button>
                            <button class="wishlist-btn"><i class="far fa-heart"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Leather & Gasoline</h3>
                        <div class="product-category">Perfumes</div>
                        <div class="product-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span>(38)</span>
                        </div>
                        <div class="product-price">
                            <span class="current-price">$54.99</span>
                        </div>
                        <button class="add-to-cart" data-product-id="8">Add to Cart</button>
                    </div>
                </div>
            </div>
            
            <div class="pagination">
                <a href="#" class="page-item active">1</a>
                <a href="#" class="page-item">2</a>
                <a href="#" class="page-item next">Next <i class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add to Cart functionality
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            const button = this;
            
            fetch('<?php echo $base_url; ?>../includes/add_to_cart.php', {
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
                // Update all cart counters on page
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

    // Quick view functionality
    const quickViewButtons = document.querySelectorAll('.quick-view');
    quickViewButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product');
            // Implement your quick view modal here
            alert(`Quick view for product ${productId} would open here`);
        });
    });

    // Price filter functionality
    const filterBtn = document.querySelector('.filter-btn');
    if (filterBtn) {
        filterBtn.addEventListener('click', function() {
            // Implement your price filtering here
            alert('Price filter would be applied here');
        });
    }

    // Sort functionality
    const sortSelect = document.getElementById('sort');
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            // Implement your sorting here
            alert(`Sorting by ${this.value}`);
        });
    }
});
</script>

<?php include '../includes/footer.php'; ?>
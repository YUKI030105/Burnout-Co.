    </main>

    <footer class="main-footer">
        <div class="footer-container">
            <!-- Footer Columns -->
            <div class="footer-columns">
                <!-- About Column -->
                <div class="footer-column">
                    <h3>About Burnout Co.</h3>
                    <img src="../assets/images/auth/logo_nav.png" alt="Burnout Co. Logo" class="footer-logo">
                    <p>High-performance apparel for car enthusiasts and racing fans. Our designs are inspired by speed, precision, and the thrill of the track.</p>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Quick Links Column -->
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="/burnout-co/index.php">Home</a></li>
                        <li><a href="/burnout-co/products/store.php">Shop</a></li>
                        <li><a href="/burnout-co/about.php">About Us</a></li>
                        <li><a href="/burnout-co/contact.php">Contact</a></li>
                        <li><a href="/burnout-co/faq.php">FAQ</a></li>
                        <li><a href="/burnout-co/privacy.php">Privacy Policy</a></li>
                        <li><a href="/burnout-co/terms.php">Terms of Service</a></li>
                    </ul>
                </div>

                <!-- Customer Service Column -->
                <div class="footer-column">
                    <h3>Customer Service</h3>
                    <ul>
                        <li><a href="/burnout-co/shipping.php">Shipping Information</a></li>
                        <li><a href="/burnout-co/returns.php">Returns & Exchanges</a></li>
                        <li><a href="/burnout-co/sizing.php">Size Guide</a></li>
                        <li><a href="/burnout-co/care.php">Product Care</a></li>
                    </ul>
                    <div class="contact-info">
                        <p><i class="fas fa-envelope"></i> support@burnoutco.com</p>
                        <p><i class="fas fa-phone"></i> (555) 123-4567</p>
                    </div>
                </div>

                <!-- Newsletter Column -->
                <div class="footer-column">
                    <h3>Newsletter</h3>
                    <p>Subscribe to get updates on new arrivals, special offers, and racing events.</p>
                    <form class="newsletter-form" action="/burnout-co/subscribe.php" method="POST">
                        <input type="email" name="email" placeholder="Your email address" required>
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="group-info">
                    <img src="/burnout-co/assets/images/logo/group-logo.png" alt="Group Logo" class="group-logo">
                    <span>Team Velocity</span>
                </div>
                <div class="copyright-disclaimer">
                    <p>&copy; <?php echo date('Y'); ?> Burnout Co. All rights reserved.</p>
                    <p class="disclaimer">DISCLAIMER: This website is for educational purposes only and is a requirement for our final project. All products and company names are used fictitiously.</p>
                </div>
                <div class="payment-methods">
                    <i class="fab fa-cc-visa"></i>
                    <i class="fab fa-cc-mastercard"></i>
                    <i class="fab fa-cc-amex"></i>
                    <i class="fab fa-cc-paypal"></i>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top" aria-label="Back to top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- JavaScript -->
    <script src="/burnout-co/assets/js/script.js"></script>
    <script src="<?php echo $base_url; ?>../assets/js/home.js"></script>
</body>
</html>
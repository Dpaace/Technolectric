<?php
$pageTitle = "Home";
include ('includes/header.php');
?>

<main>
    <section class="hero">
        <img src="./images/home.jpg" alt="Hero Image" class="hero-image">
        <div class="hero-content">
            <h1>Welcome to Tours and Travels</h1>
            <p>Explore our exclusive travel packages and start your adventure today!</p>
            <a href="packages.php" class="btn">View Packages</a>
        </div>
    </section>

    <section class="featured-packages">
        <h2>Featured Packages</h2>
        <div class="package">
            <img src="images/mountain.jpg" alt="Mountain Adventure">
            <h3>Mountain Adventure</h3>
            <p>Experience the thrill of mountain hiking and breathtaking views.</p>
        </div>
        <div class="package">
            <img src="images/beach.jpg" alt="Beach Getaway">
            <h3>Beach Getaway</h3>
            <p>Relax on the sandy beaches and enjoy the sunshine.</p>
        </div>
        <div class="package">
            <img src="images/city.jpg" alt="City Tours">
            <h3>City Tours</h3>
            <p>Explore the vibrant city life and cultural attractions.</p>
        </div>
    </section>

    <section class="testimonials">
        <h2>What Our Customers Say</h2>
        <div class="testimonial-card">
            <img src="images/jane.jpg" alt="Jane Doe" class="testimonial-image">
            <div class="testimonial-content">
                <p>"The best travel experience ever! Highly recommended!"</p>
                <p class="customer-name">- Jane Doe</p>
            </div>
        </div>
        <div class="testimonial-card">
            <img src="images/jhon.jpg" alt="John Smith" class="testimonial-image">
            <div class="testimonial-content">
                <p>"Amazing packages and excellent service. Will book again!"</p>
                <p class="customer-name">- John Smith</p>
            </div>
        </div>
        <div class="testimonial-card">
            <img src="images/tina.jpg" alt="John Smith" class="testimonial-image">
            <div class="testimonial-content">
                <p>"I am definitely going again. Awesome experience!"</p>
                <p class="customer-name">- John Smith</p>
            </div>
        </div>
    </section>

    <section class="call-to-action">
        <h2>Ready to start your adventure?</h2>
        <a href="registration.php" class="btn">Register Now</a>
    </section>
</main>

<?php
include ('includes/footer.php');
?>
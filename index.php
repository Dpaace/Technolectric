<?php
$pageTitle = "Home";
include ('includes/header.php');
?>

<main class="home-container">
    <section class="landing-section">
        <img src="./images/home.jpg" alt="Landing Page Image" class="landing-image">
        <div class="landing-content">
            <h1>Welcome to the Techy Savage Page!</h1>
            <p>Discover the latest in technology, gadgets, and innovation.</p>
            <a href="products.php" class="btn">Explore Products</a>
        </div>
    </section>

    <section class="about-section" style="padding: 50px;">
        <center>
            <h2><b>About Us</b></h2>
        </center>
        <p>We are passionate about technology and strive to bring you the most cutting-edge products on the market. Our
            team of tech enthusiasts works tirelessly to curate a collection of gadgets and devices that will enhance
            your life and keep you ahead of the curve.</p>
        <center><a href="aboutus.php" class="link">Learn More</a></center>
    </section>

    <section class="featured-products" style="padding: 50px;">
        <center>
            <h2><b>Featured Products</b></h2>
        </center>
        <div class="product-grid">
            <div class="product-card">
                <img src="./images/pc.jpg" alt="PC" style="border-radius:30px;">
                <h3>PC's</h3>
                <a href="products.php" class="btn">View Details</a>
            </div>
            <div class="product-card">
                <img src="./images/monitor.jpg" alt="Monitor" style="border-radius:30px;">
                <h3>Monitors</h3>
                <a href="products.php" class="btn">View Details</a>
            </div>
            <div class="product-card">
                <img src="./images/headphone.png" alt="Headphone" style="border-radius:30px;">
                <h3>Headphones</h3>
                <a href="products.php" class="btn">View Details</a>
            </div>
        </div>
    </section>

    <section class="newsletter-section">
        <center>
            <h2><b>Subscribe to Our Newsletter</b></h2>
        </center>
        <form action="#" method="post" class="newsletter-form">
            <input type="email" name="email" placeholder="Enter your email" required>
            <button type="submit" class="btn">Subscribe</button>
        </form>
    </section>
</main>

<?php
include ('includes/footer.php');
?>

<style>
    .landing-section {
        position: relative;
        text-align: center;
        color: white;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }

    .landing-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 0;
    }

    .landing-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .landing-content {
        position: relative;
        z-index: 2;
    }

    .landing-section h1 {
        margin: 0;
        font-size: 3em;
    }

    .landing-section p {
        font-size: 1.5em;
        margin: 20px 0;
    }

    .landing-section .btn {
        display: inline-block;
        margin-top: 20px;
        padding: 15px 30px;
        background-color: #ff6347;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 1.2em;
    }

    .landing-section .btn:hover {
        background-color: #ff4500;
    }

    @media (max-width: 768px) {
        .landing-section h1 {
            font-size: 2em;
        }

        .landing-section p {
            font-size: 1.2em;
        }

        .landing-section .btn {
            font-size: 1em;
            padding: 10px 20px;
        }
    }

    .about-section,
    .featured-products,
    .newsletter-section {
        margin-bottom: 50px;
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .product-card {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
    }

    .product-card img {
        max-width: 100%;
        height: 300px;
    }

    .newsletter-form {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .newsletter-form input[type="email"] {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-right: 10px;
    }

    .newsletter-form button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .newsletter-form button:hover {
        background-color: #0056b3;
    }
</style>
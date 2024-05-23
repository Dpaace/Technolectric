<?php
$pageTitle = "About Us";
include('includes/header.php');
?>

<main class="about-container">
    <section class="about-section">
        <h1>About Us</h1>
        <img src="./images/about.jpg" alt="" class="about-image">
        <p>Welcome to Tours and Travels, your trusted partner in planning unforgettable adventures. We specialize in providing exclusive travel packages that cater to all your needs. Our team of dedicated professionals is committed to ensuring your travel experiences are nothing short of extraordinary.</p>
        <p>Our mission is to make travel accessible, affordable, and enjoyable for everyone. Whether you're looking for a thrilling adventure or a relaxing getaway, we have the perfect package for you. Explore our website to discover a wide range of travel options and start planning your next journey with us today!</p>
    </section>
</main>

<?php
include('includes/footer.php');
?>

<style>
    .about-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .about-section {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .about-image {
        width: 100%;
        height: auto;
        max-height: 350px;
        object-fit: fill;
        border-radius: 5px;
    }

    .about-section h1 {
        font-size: 2em;
        margin-bottom: 20px;
    }

    .about-section p {
        font-size: 1.2em;
        line-height: 1.6;
        color: #333;
    }
</style>

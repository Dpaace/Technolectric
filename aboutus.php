<?php
$pageTitle = "About Us";
include ('includes/header.php');
?>

<main class="about-us-container">
    <div class="about-us-content">
        <div class="about-us-info">
            <h1><b>About Us</b></h1>
            <p>Welcome to our Techy website. We are dedicated to providing you with the latest and greatest in
                technology products. Our mission is to make technology accessible and enjoyable for everyone.</p>
            <p>At Techy, we believe in innovation, quality, and customer satisfaction. Whether you're looking for
                cutting-edge gadgets, smart devices, or tech accessories, we've got you covered.</p>
            <p>Explore our website to discover a wide range of products, read helpful reviews, and stay up-to-date with
                the latest trends in the tech world. Thank you for choosing Techy!</p>
        </div>
        <div class="about-us-image">
            <img src="./images/aboutus.jpg" alt="About Us Image">
        </div>
    </div>
</main>

<?php
include ('includes/footer.php');
?>

<style>
    .about-us-container {
        padding: 50px;
    }

    .about-us-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .about-us-info {
        flex: 1;
        margin-right: 20px;
    }

    .about-us-image img {
        max-width: 100%;
        height: auto;
        border-radius: 30px;
    }
</style>
<?php
$pageTitle = "Products";
include ('includes/header.php');
require_once "database.php";
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>

<main class="product-section">
    <h1><b>Our Products</b></h1>
    <div class="product-container">
        <?php $count = 0; ?>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <?php if ($count % 3 == 0) { ?>
                <div class="product-row">
                <?php } ?>
                <div class="product-column">
                    <div class="product-card">
                        <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['name']; ?>" class="product-image">
                        <h2><?php echo $row['name']; ?></h2>
                        <p>Price: $<?php echo $row['price']; ?></p>
                        <a href="product_detail.php?id=<?php echo $row['id']; ?>" class="product-details-btn">See
                            Details</a>
                    </div>
                </div>
                <?php if ($count % 3 == 2 || $count == mysqli_num_rows($result) - 1) { ?>
                </div>
            <?php } ?>
            <?php $count++; ?>
        <?php } ?>
    </div>
</main>


<?php
include ('includes/footer.php');
?>

<style>
    .product-section {
        padding: 50px;
        background-color: #f4f4f4;
    }

    .product-section h1 {
        text-align: center;
        font-size: 2.5em;
        margin-bottom: 40px;
        color: #333;
    }

    .product-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .product-row {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
    }

    .product-column {
        width: 33.33%;
        padding: 10px;
    }

    @media (max-width: 768px) {
        .product-column {
            width: 100%;
        }
    }

    .product-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        background-color: #fff;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .product-card h2 {
        font-size: 1.5em;
        margin: 10px 0;
        color: #333;
    }

    .product-card p {
        color: #666;
    }

    .product-card .product-image {
        width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .product-details-btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .product-details-btn:hover {
        background-color: #0056b3;
        color: #fff;
    }
</style>
<?php
$pageTitle = "Product Details";
include ('includes/header.php');
require_once "database.php";

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $query = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        ?>
        <main style="padding: 50px;">
            <div class="product-details-section">
                <div class="product-image-container">
                    <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['name']; ?>" class="product-image">
                </div>
                <div class="product-info">
                    <h1><?php echo $product['name']; ?></h1>
                    <p><?php echo $product['description']; ?></p>
                    <p>Price: $<?php echo $product['price']; ?></p>
                    <form action="add_cart.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <input type="submit" value="Add to Cart" class="action-button" onclick="alert('Product Successfully Added to Cart.')">
                    </form>
                </div>
            </div>
        </main>
        <?php
    } else {
        echo "<p>Product not found.</p>";
    }
} 

include ('includes/footer.php');
?>

<style>
    .product-details-section {
        display: flex;
        align-items: center;
    }

    .product-image-container {
        flex: 1;
        margin-right: 20px;
    }

    .product-image {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .product-info {
        flex: 2;
    }

    .product-info h1 {
        font-size: 2em;
        margin-bottom: 10px;
    }

    .product-info p {
        font-size: 1.2em;
        margin-bottom: 10px;
    }

    .action-button {
        padding: 10px 20px;
        font-size: 1em;
        color: #fff;
        background-color: orange;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-transform: uppercase;
    }

    .action-button:hover {
        background-color: aqua;
        color: black;
    }
</style>
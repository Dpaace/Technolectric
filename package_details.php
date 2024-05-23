<?php
$pageTitle = "Package Details";
include ('includes/header.php');
require_once "database.php";

if (isset($_GET['id'])) {
    $package_id = $_GET['id'];

    $query = "SELECT * FROM packages WHERE id = $package_id";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $package = mysqli_fetch_assoc($result);
        ?>

        <main style="padding: 50px;">
            <div class="package-details">
                <img src="<?php echo $package['image_url']; ?>" alt="<?php echo $package['name']; ?>" class="package-image">
                <h1><?php echo $package['name']; ?></h1>
                <p><?php echo $package['description']; ?></p>
                <p>Price: $<?php echo $package['price']; ?></p>
                <form action="add_to_cart.php" method="POST">
                    <input type="hidden" name="package_id" value="<?php echo $package['id']; ?>">
                    <input type="submit" value="Add to Cart" class="btn">
                </form>
            </div>
        </main>

        <?php
    } else {
        echo "<p>Package not found.</p>";
    }
} else {
    echo "<p>No package ID provided.</p>";
}

include ('includes/footer.php');
?>

<style>
    .package-details {
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
        background-color: #f4f4f4;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .package-image {
        width: 100%;
        height: auto;
        max-height: 400px;
        object-fit: contain;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .package-details h1 {
        font-size: 2.5em;
        margin: 10px 0;
    }

    .package-details p {
        font-size: 1.2em;
        margin: 10px 0;
    }

    .package-details .btn {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .package-details .btn:hover {
        background-color: aqua;
        color: black;
    }
</style>
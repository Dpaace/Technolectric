<?php
$pageTitle = "Packages";
include ('includes/header.php');
require_once "database.php";
$query = "SELECT * FROM packages";
$result = mysqli_query($conn, $query);
?>

<main style="padding: 50px;">
    <h1>Our Packages</h1>
    <div class="package-container">
        <?php $count = 0; ?>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <?php if ($count % 3 == 0) { ?>
                <div class="row">
                <?php } ?>
                <div class="col">
                    <div class="card">
                        <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['name']; ?>" class="package-image">
                        <h2><?php echo $row['name']; ?></h2>
                        <p><?php echo $row['short_description']; ?></p>
                        <p>Price: $<?php echo $row['price']; ?></p>
                        <a href="package_details.php?id=<?php echo $row['id']; ?>" class="details-btn">See Details</a>
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
    .package-container {
        display: flex;
        flex-wrap: wrap;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .col {
        width: 33.33%;
        padding: 10px;
    }

    .card {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        margin-bottom: 20px;
        text-align: center;
    }

    .package-image {
        width: 100%;
        height: auto;
        max-height: 200px;
        object-fit: fill;
        border-radius: 5px 5px 0 0;
    }

    .details-btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .details-btn:hover {
        background-color: aqua;
        color: black;
    }

    @media (max-width: 768px) {
        .col {
            width: 100%;
        }
    }
</style>
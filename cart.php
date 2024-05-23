<?php
$pageTitle = "Cart";
include ('includes/header.php');
require_once "database.php";

if (!isset($_SESSION["user"]) || !is_array($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION["user"]["id"];
$query = "SELECT * FROM cart JOIN products ON cart.product_id = products.id WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);

?>


<main class="cart-container">
    <h1 class="cart-heading">Your Techy Cart</h1>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        ?>

        <form id="updateCartForm" class="cart-form" method="POST">
            <ul class="cart-list">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <li class="cart-item">
                        <h2 class="cart-item-name"><?php echo $row['name']; ?></h2>
                        <p class="cart-item-price">Price: $<?php echo $row['price']; ?></p>
                        <p class="cart-item-quantity">Quantity: <?php echo $row['quantity']; ?></p>
                        <div class="cart-item-update">
                            <label for="quantity_<?php echo $row['id']; ?>" class="cart-item-update-label">Update
                                Quantity:</label>
                            <button type="button" class="cart-quantity-btn minus">-</button>
                            <input type="number" id="quantity_<?php echo $row['id']; ?>"
                                name="quantity[<?php echo $row['id']; ?>]" class="cart-quantity-input"
                                value="<?php echo $row['quantity']; ?>" min="1" readonly>
                            <button type="button" class="cart-quantity-btn plus">+</button>
                        </div>
                        <button type="button" class="cart-item-remove" data-package-id="<?php echo $row['id']; ?>">
                            <img src="./images/delete.png" alt="Delete" class="cart-item-delete-icon">
                        </button>
                    </li>

                <?php } ?>
            </ul>
            <input type="submit" class="cart-update-btn" value="Update Cart">
        </form>

        <?php
    } else { ?>
        <div class="empty-cart">
            <img src="./images/empty.png" alt="Empty Cart" class="empty-cart-image">
            <p class="empty-cart-message">Your techy cart is empty.</p>
        </div>
    <?php }
    ?>
</main>


<?php
include ('includes/footer.php');
?>

<!-- Assuming you have included jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        // Plus Button Click Event
        $('.plus').on('click', function () {
            var input = $(this).siblings('.cart-quantity-input');
            var newValue = parseInt(input.val()) + 1;
            input.val(newValue);
        });

        // Minus Button Click Event
        $('.minus').on('click', function () {
            var input = $(this).siblings('.cart-quantity-input');
            var newValue = parseInt(input.val()) - 1;
            if (newValue >= 1) {
                input.val(newValue);
            }
        });
    });
</script>

<script>
    document.getElementById("updateCartForm").addEventListener("submit", function (event) {
        // event.preventDefault();

        var formData = new FormData(this);
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    alert("Cart updated successfully");
                } else {
                    alert("Failed to update cart.");
                }
            }
        };

        xhr.open("POST", "update_cart.php");
        xhr.send(formData);
    });

    document.querySelectorAll('.cart-item-remove').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var productId = this.getAttribute('data-package-id');
            var confirmation = confirm('Are you sure you want to remove this item from the cart?');
            if (confirmation) {
                removeItemFromCart(productId);
            }
        });
    });

    function removeItemFromCart(productId) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'remove_from_cart.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                location.reload()
            } else {
                alert('Error: Unable to remove item from cart.');
            }
        };
        xhr.send('product_id=' + productId);
    }
</script>



<style>
    .cart-container {
        padding: 50px;
        background-color: #f4f4f4;
        border-radius: 10px;
    }

    .cart-heading {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .cart-list {
        list-style-type: none;
        padding: 0;
    }

    .cart-item {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
        background-color: #fff;
    }

    .cart-item-name {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333;
    }

    .cart-item-price {
        font-size: 18px;
        color: #666;
        margin-bottom: 10px;
    }

    .cart-item-quantity {
        font-size: 18px;
        color: #666;
        margin-bottom: 10px;
    }

    .cart-item-update {
        margin-top: 10px;
    }

    .cart-item-update-label {
        font-size: 18px;
        color: #333;
        margin-right: 10px;
    }

    .cart-quantity-btn {
        font-size: 18px;
        color: #fff;
        background-color: #007bff;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .cart-quantity-btn:hover {
        background-color: #0056b3;
    }

    .cart-quantity-input {
        width: 60px;
        font-size: 16px;
        padding: 5px;
        text-align: center;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .cart-item-remove {
        border: none;
        background: none;
        cursor: pointer;
        padding: 0;
        margin: 0;
    }

    .cart-item-delete-icon {
        width: 20px;
        height: 20px;
        opacity: 0.5;
        transition: opacity 0.3s;
    }

    .cart-item-delete-icon:hover {
        opacity: 0.8;
    }

    .empty-cart {
        text-align: center;
    }

    .empty-cart-image {
        width: 150px;
        height: 150px;
        margin-bottom: 20px;
    }

    .empty-cart-message {
        font-size: 20px;
        color: #666;
    }
</style>
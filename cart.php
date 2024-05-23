<?php
$pageTitle = "Cart";
include ('includes/header.php');
require_once "database.php";

if (!isset($_SESSION["user"]) || !is_array($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION["user"]["id"];
$query = "SELECT * FROM cart JOIN packages ON cart.package_id = packages.id WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);

?>

<main>
    <h1>Your Cart</h1>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        ?>

        <form id="updateCartForm" method="POST">
            <ul style="list-style-type: none;">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <li class="cart-item">
                        <h2><?php echo $row['name']; ?></h2>
                        <p>Price: $<?php echo $row['price']; ?></p>
                        <p>Quantity: <?php echo $row['quantity']; ?></p>
                        <p>
                            Update Quantity:
                            <button type="button" class="quantity-btn minus">-</button>
                            <input type="number" name="quantity[<?php echo $row['id']; ?>]" class="quantity-input"
                                value="<?php echo $row['quantity']; ?>" min="1" readonly>
                            <button type="button" class="quantity-btn plus">+</button>
                        </p>
                        <button type="button" class="remove-btn" data-package-id="<?php echo $row['id']; ?>">
                            <img src="images/delete.png" alt="Delete" class="delete-icon">
                        </button>
                    </li>

                <?php } ?>
            </ul>
            <input style="margin-left: 32px;" type="submit" value="Update Cart">
        </form>

        <?php
    } else { ?>
        <div style="text-align: center; font-size: 20px;">
            <img src="./images/empty_cart.png" alt="Empty Cart">
            <p>Your cart is empty.</p>
        </div>
    <?php }
    
    ?>
</main>

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


    document.querySelectorAll(".quantity-btn").forEach(function (btn) {
        btn.addEventListener("click", function () {
            var input = this.parentNode.querySelector(".quantity-input");
            var currentValue = parseInt(input.value);
            if (this.classList.contains("plus")) {
                input.value = currentValue + 1;
            } else {
                input.value = currentValue > 1 ? currentValue - 1 : 1;
            }
        });
    });

    document.querySelectorAll('.remove-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var packageId = this.getAttribute('data-package-id');
            var confirmation = confirm('Are you sure you want to remove this item from the cart?');
            if (confirmation) {
                removeItemFromCart(packageId);
            }
        });
    });

    function removeItemFromCart(packageId) {
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
        xhr.send('package_id=' + packageId);
    }
</script>

<style>
    .cart-item {
        border: 1px solid #ccc;
        border-radius: 8px;
        margin-bottom: 20px;
        padding: 20px;
        background-color: #fff;
    }

    .cart-item h2 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .cart-item p {
        margin-bottom: 5px;
    }

    .cart-item .quantity-btn {
        background-color: #f0f0f0;
        border: none;
        color: #333;
        cursor: pointer;
        font-size: 18px;
        padding: 5px 10px;
        margin-right: 5px;
        border-radius: 5px;
    }

    .cart-item .quantity-input {
        width: 50px;
        text-align: center;
    }

    .cart-item .remove-btn {
        background: none;
        border: none;
        cursor: pointer;
        padding: 0;
    }

    .cart-item .remove-btn img {
        width: 20px;
        height: 20px;
    }

    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

    @media (max-width: 600px) {
        main {
            padding: 10px;
        }
    }

</style>


<?php
include ('includes/footer.php');
?>
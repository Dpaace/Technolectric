<?php
session_start();
require_once "database.php";

if (isset($_SESSION['user']['id'])) {
    $user_id = $_SESSION['user']['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['quantity']) && is_array($_POST['quantity'])) {
            foreach ($_POST['quantity'] as $product_id => $quantity) {
                $product_id = mysqli_real_escape_string($conn, $product_id);
                $quantity = mysqli_real_escape_string($conn, $quantity);
                $query = "UPDATE cart SET quantity = $quantity WHERE user_id = $user_id AND product_id = $product_id";
                mysqli_query($conn, $query);
            }
            echo "Cart updated successfully.";
        } else {
            echo "No items to update.";
        }
    } else {
        echo "Invalid request.";
    }
} else {
    echo "User not logged in.";
}
?>

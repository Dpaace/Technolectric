<?php
session_start();
require_once "database.php";

if (isset($_SESSION['user']['id']) && isset($_POST['product_id'])) {
    $user_id = $_SESSION['user']['id'];
    $product_id = $_POST['product_id'];

    $query = "DELETE FROM cart WHERE user_id = $user_id AND product_id = $product_id";
    mysqli_query($conn, $query);

    header("Location: cart.php");
    exit();
} else {
    echo "Error: Unable to remove item from cart.";
}
?>

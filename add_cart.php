<?php
session_start();
require_once "database.php";

if (isset($_POST['product_id']) && isset($_SESSION['user']['id'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user']['id'];

    $check_query = "SELECT * FROM cart WHERE user_id = $user_id AND product_id = $product_id";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $row = mysqli_fetch_assoc($check_result);
        $cart_id = $row['id'];
        $new_quantity = $row['quantity'] + 1;

        $update_query = "UPDATE cart SET quantity = $new_quantity WHERE id = $cart_id";
        mysqli_query($conn, $update_query);
    } else {
        $insert_query = "INSERT INTO cart (user_id, product_id, quantity) VALUES ($user_id, $product_id, 1)";
        mysqli_query($conn, $insert_query);
    }

    header("Location: products.php");
    exit();
} else {
    header("Location: login.php");
    exit();
}
?>

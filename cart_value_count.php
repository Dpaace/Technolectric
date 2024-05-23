<?php
session_start();
require_once "database.php";

if (isset($_SESSION['user']) && isset($_SESSION['user']['id'])) {
    $user_id = $_SESSION['user']['id'];
    $query = "SELECT SUM(quantity) AS total_items FROM cart WHERE user_id = $user_id";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $cart_count = $row['total_items'] ?? 0;
    } else {
        $cart_count = 0;
    }
} else {
    $cart_count = 0;
}

echo $cart_count;
?>

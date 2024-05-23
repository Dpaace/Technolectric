<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/contact.css">

    <style>
        #cart-icon {
            display: flex;
            align-items: center;
        }

        #cart-image {
            width: 20px;
            height: 20px;
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="packages.php">Packages</a></li>
                <li><a href="safari.php">Safari</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <?php if (isset($_SESSION["user"])): ?>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="logout.php" onclick="return confirmLogout()">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="registration.php">Register</a></li>
                <?php endif; ?>

                <li>
                    <a href="cart.php" id="cart-icon">
                        <img id="cart-image" src="./images/cart.png" alt="cart">
                        <span id="cart-count">0</span>
                        <span id="cart-total"></span>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <script>
        function confirmLogout() {
            return confirm('Are you sure you want to log out?');
        }

        document.addEventListener("DOMContentLoaded", function () {
            fetch('cart_count.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('cart-count').textContent = data;
                });
        });
    </script>
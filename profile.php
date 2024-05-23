<?php
$pageTitle = "Profile";
include ('includes/header.php');

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION["user"];

?>

<main class="profile-container">
    <section class="profile-section">
        <h1>Your Profile</h1>
        <p><strong>Full Name:</strong> <?php echo htmlspecialchars($user['full_name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <a href="profile_edit.php" class="btn">Edit Profile</a>
    </section>
</main>


<?php
include ('includes/footer.php');
?>

<style>
    a {
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: none;
    }

    .profile-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        padding: 20px;
        background-color: #1a1a1a;
    }

    .profile-section {
        background-color: #2c2c2c;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 800px;
        height: 300px;
        text-align: center;
    }

    .profile-section h1 {
        margin-bottom: 20px;
        color: #fff;
    }

    .profile-section p {
        font-size: 1.1em;
        color: #ccc;
        margin-bottom: 10px;
    }

    .profile-section p strong {
        color: #fff;
    }

    .btn {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: orange;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #0056b3;
        color: orange;
    }

    @media (max-width: 768px) {
        .profile-section {
            padding: 20px;
        }
    }
</style>
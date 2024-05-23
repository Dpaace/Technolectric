<?php
$pageTitle = "Profile";
include('includes/header.php');

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
        <a href="edit_profile.php" class="btn">Edit Profile</a>
    </section>
</main>

<?php
include('includes/footer.php');
?>

<style>
    .profile-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .profile-section {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .profile-section h1 {
        font-size: 2em;
        margin-bottom: 20px;
    }

    .profile-section p {
        font-size: 1.2em;
        line-height: 1.6;
        color: #333;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #333;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }

    .btn:hover {
        background-color: #555;
    }
</style>

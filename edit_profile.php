<?php
$pageTitle = "Edit Profile";
include('includes/header.php');
require_once "database.php";

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION["user"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "UPDATE users SET full_name = '$full_name', email = '$email' WHERE id = {$user['id']}";
    if (mysqli_query($conn, $query)) {
      
        $_SESSION["user"]["full_name"] = $full_name;
        $_SESSION["user"]["email"] = $email;
        header("Location: profile.php");
        exit;
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}
?>

<main class="profile-container">
    <section class="profile-section">
        <h1>Edit Profile</h1>
        <form action="edit_profile.php" method="POST">
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Update Profile">
            </div>
        </form>
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

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="email"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .form-group input[type="submit"] {
        padding: 10px 20px;
        background-color: #333;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .form-group input[type="submit"]:hover {
        background-color: #555;
    }
</style>

<?php
$pageTitle = "Profile Edit";
include ('includes/header.php');
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
        <form action="profile_edit.php" method="POST">
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name"
                    value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>"
                    required>
            </div>
            <div class="form-group">
                <input type="submit" value="Update Profile" class="btn">
            </div>
        </form>
    </section>
</main>


<?php
include ('includes/footer.php');
?>

<style>

    a {
        color: #fff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
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
        max-width: 400px;
        text-align: center;
    }

    .profile-section h1 {
        margin-bottom: 20px;
        color: #fff;
    }
    .form-group {
        margin-bottom: 20px;
        text-align: left;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #ccc;
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #333;
        color: #fff;
    }
    .btn {
        width: 100%;
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
<?php
if (isset($_SESSION["user"])) {
    header("Location: dashboard.php");
    exit(); 
}
?>

<?php
$pageTitle = "Login";
include ('includes/header.php');
?>

<main style="padding: 50px;">
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_assoc($result); 
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = $user; 
                    header("Location: index.php");
                    exit(); 
                } else {
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Email does not exist</div>";
            }
        }
        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter Email:" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
        <div>
            <p>Not registered yet <a href="registration.php">Register Here</a></p>
        </div>
    </div>
</main>

<?php
include ('includes/footer.php');
?>

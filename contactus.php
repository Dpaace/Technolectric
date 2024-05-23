<?php
$pageTitle = "Contact Us";
include ('includes/header.php');


require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $errors = array();
    if (empty($name)) {
        array_push($errors, "Name is required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }
    if (empty($message)) {
        array_push($errors, "Message is required");
    }
    if (count($errors) == 0) {
        $sql = "INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);
            mysqli_stmt_execute($stmt);
            $_SESSION['success'] = "Your message has been sent successfully!";
        } else {
            $_SESSION['error'] = "Something went wrong. Please try again.";
        }
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['errors'] = $errors;
    }
}
?>

<main class="contact-page">
    <h1><b>Contact Us</b></h1>

    <?php if (isset($_SESSION['errors'])): ?>
        <div class="alert alert-danger">
            <?php foreach ($_SESSION['errors'] as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
            <?php unset($_SESSION['errors']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <p><?php echo $_SESSION['success']; ?></p>
            <?php unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger">
            <p><?php echo $_SESSION['error']; ?></p>
            <?php unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>

    <div class="contact-container">
        <div class="image-section">
            <img src="./images/contactus.jpg" alt="Contact Us Image">
        </div>
        <div class="form-section">
            <form id="contactForm" method="POST">
                <div class="input-group">
                    <label for="contact_name">Name:</label>
                    <input type="text" id="contact_name" name="name" required>
                </div>
                <div class="input-group">
                    <label for="contact_email">Email:</label>
                    <input type="email" id="contact_email" name="email" required>
                </div>
                <div class="input-group">
                    <label for="contact_message">Message:</label>
                    <textarea id="contact_message" name="message" rows="5" required></textarea>
                </div>
                <div class="button-group">
                    <input type="submit" value="Send Message">
                </div>
            </form>
        </div>
    </div>
</main>



<?php
include ('includes/footer.php');
?>


<style>
    .contact-page {
        width: 100%;
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 8px;
    }

    .contact-page h1 {
        text-align: center;
        font-size: 2.5em;
        margin-bottom: 20px;
        color: #333;
    }

    .contact-container {
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        justify-content: space-between;
    }

    .image-section {
        flex: 1;
        padding-right: 20px;
    }

    .image-section img {
        width: 450px;
        height: 450px;
        border-radius: 8px;
    }

    .form-section {
        flex: 2;
    }

    .input-group {
        margin-bottom: 15px;
    }

    .input-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
    }

    .input-group input,
    .input-group textarea {
        width: calc(100% - 20px);
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1em;
        background-color: #fff;
        box-sizing: border-box;
    }

    .input-group input:focus,
    .input-group textarea:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.1);
    }

    .button-group {
        text-align: center;
    }

    .button-group input[type="submit"] {
        padding: 10px 20px;
        font-size: 1em;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s, box-shadow 0.3s;
    }

    .button-group input[type="submit"]:hover {
        background-color: #0056b3;
        box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2);
    }

    @media (max-width: 768px) {
        .contact-container {
            flex-direction: column;
        }

        .image-section {
            padding-right: 0;
            margin-bottom: 20px;
        }

        .form-section {
            width: 100%;
        }
    }
</style>
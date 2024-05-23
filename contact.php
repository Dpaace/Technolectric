<?php
$pageTitle = "Contact";
include('includes/header.php');
?>



<main style="width: 700px; margin: 0 auto; padding: 20px;">
    <h1>Contact Us</h1>
    <form id="contactForm"  method="POST">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Send Message">
        </div>
    </form>
</main>

<script>
    document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault(); 

        alert('You have sent the message.');
        this.submit();
    });
</script>

<?php
include('includes/footer.php');
?>

<?php
$pageTitle = "Safari";
include ('includes/header.php');
?>


<main>
    <section id="safari-packages">
        <h2>Discover Our Safari Adventures</h2>
        <p>Embark on a journey through the untamed wilderness of Nepal. Our safari packages offer an intimate glimpse
            into the habitats of some of the world's most fascinating wildlife.</p>
        <div class="safari-container">
            <div class="safari-card">
                <div class="safari-image safari-one"></div>
                <div class="safari-content">
                    <h3>Chitwan National Park Safari</h3>
                    <p>Explore the dense forests of Chitwan and encounter rare species such as the Bengal tiger and
                        one-horned rhinoceros.</p>
                    <button>Learn More</button>
                </div>
            </div>
            <div class="safari-card">
                <div class="safari-image safari-two"></div>
                <div class="safari-content">
                    <h3>Bardia National Park Safari</h3>
                    <p>Immerse yourself in the remote beauty of Bardia, with its abundant wildlife and pristine river
                        habitats.</p>
                    <button>Learn More</button>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include ('includes/footer.php');
?>

<style>
    #safari-packages {
        padding: 40px 20px;
        background-color: #fff5ee;
        text-align: center;
    }

    #safari-packages h2 {
        color: #6b8e23;
        margin-bottom: 20px;
    }

    #safari-packages p {
        margin-bottom: 30px;
    }

    .safari-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    .safari-card {
        width: 300px;
        margin-bottom: 20px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
    }

    .safari-card:hover {
        transform: translateY(-5px);
    }

    .safari-image {
        width: 100%;
        height: 200px;
        background-size: cover;
        background-position: center;
    }

    .safari-one {
        background-image: url('headerSafari/rideElephant.png');
    }

    .safari-two {
        background-image: url('headerSafari/throughJungle.png');
    }

    .safari-content {
        background-color: #ffffff;
        padding: 20px;
    }

    .safari-content h3 {
        color: #6b8e23;
        margin-bottom: 10px;
    }

    .safari-content p {
        color: #333;
        font-size: 0.9em;
        margin-bottom: 15px;
    }

    .safari-content button {
        background-color: #80c904;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .safari-content button:hover {
        background-color: #6b8e23;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - PetCare</title>
    <link rel="stylesheet" href="CSS/dashboard.css">
</head>
<body>
    <div class="navbar">
        <div class="icon">
            <h2 class="logo">PetCare</h2>
        </div>
        <div class="menu">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#store">Store</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="Logout.php">Logout</a></li>
            </ul>
        </div>
    </div>

    <div class="dashboard-container">
        <div class="welcome-message">
            <h1>Welcome, User!</h1>
            <p>Thank you for logging in. We're happy to have you at PetCare!</p>
        </div>

        <div class="store-section" id="store">
            <h2>Our Pet Store</h2>
            <div class="product-grid">
               
                <div class="product-item">
                    <img src="https://example.com/dog-toy.jpg" alt="Dog Toy">
                    <h3>Dog Toy</h3>
                    <p>Durable and fun toy for your dog.</p>
                    <p class="price">$10.99</p>
                    <button class="buy-btn">Buy Now</button>
                </div>
              
            </div>
        </div>

        <div class="contact-form-section" id="contact">
            <h2>Contact Us</h2>
            <p>If you'd like to book a service for your pet, fill out the form below.</p>
            <form action="contact.php" method="POST">
                <div class="name-container">
                    <input type="text" placeholder="First Name" required>
                    <input type="text" placeholder="Last Name" required>
                </div>
                <input type="email" placeholder="Email" required>
                <input type="tel" placeholder="Phone Number" required>
                <div class="radio-group">
                    <input type="radio" id="grooming" name="service" value="Grooming" required>
                    <label for="grooming">Grooming</label>
                    <input type="radio" id="boarding" name="service" value="Boarding" required>
                    <label for="boarding">Boarding</label>
                    <input type="radio" id="other" name="service" value="Other" required>
                    <label for="other">Other</label>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>

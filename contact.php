<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Go Trip</title>
    <link rel="stylesheet" href="css/main.css"> <!-- Link to your main CSS file -->
    <link rel="stylesheet" href="css/constyle.css"> <!-- Link to the contact form CSS file -->
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>
<body>
    <!-- Header Section -->
    <section class="nav-bar">
        <div class="logo">Bus <span style="color:#ff6347;">Info</span></div>
        <div class="hamburger">&#9776;</div>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <!-- <li><a href="#">Service</a></li> -->
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </section>

    <!-- Main Content -->
    <main>
        <section class="contact-section">
            <div class="container">
                <div class="content">
                    <div class="left-side">
                        <div class="address details">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="topic">Address</div>
                            <div class="text-one">Ambikapur,(C.g)</div>
                            <div class="text-two">Street Address</div>
                        </div>
                        <div class="phone details">
                            <i class="fas fa-phone-alt"></i>
                            <div class="topic">Phone</div>
                            <div class="text-one">+123 456 7890</div>
                            <div class="text-two">+098 765 4321</div>
                        </div>
                        <div class="email details">
                            <i class="fas fa-envelope"></i>
                            <div class="topic">Email</div>
                            <div class="text-one">info@gotrip.com</div>
                            <div class="text-two">support@gotrip.com</div>
                        </div>
                    </div>
                    <div class="right-side">
                        <div class="topic-text">Send us a message</div>
                        <p>If you have any queries or need any help, feel free to send us a message. We are here to assist you.</p>
                        <form action="contact_form.php" method="POST">
                            <div class="input-box">
                                <input type="text" name="name" placeholder="Enter your name" required>
                            </div>
                            <div class="input-box">
                                <input type="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="input-box message-box">
                                <textarea name="message" placeholder="Enter your message" required></textarea>
                            </div>
                            <div class="button">
                                <input type="submit" value="Send Now">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer Section -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-logo">
                <h2>Bus Info</h2>
                <p>Making travel easy and enjoyable for everyone. Your trusted travel partner.</p>
            </div>
            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h3>Support</h3>
                <ul>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Report an Issue</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-contact">
                <h3>Contact Us</h3>
                <p>Email: info@gotrip.com</p>
                <p>Phone: +123 456 7890</p>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-square-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>
            <div class="footer-subscribe">
                <h3>Subscribe to Our Newsletter</h3>
                <form action="#">
                    <input type="email" placeholder="Enter your email" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Bus Info. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
        // Toggle menu on click
        document.querySelector('.hamburger').addEventListener('click', function () {
            document.querySelector('.menu').classList.toggle('active');
        });

        // Close menu on outside click
        document.addEventListener('click', function (event) {
            if (!document.querySelector('.nav-bar').contains(event.target)) {
                document.querySelector('.menu').classList.remove('active');
            }
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>BusInfo.com</title>
</head>

<body>
    <!--===========Nav Bar=================-->
    <section class="nav-bar">
        <div class="logo">Bus <span style="color:#ff6347;">Info</span></div>
        <div class="hamburger">&#9776;</div>
        <ul class="menu">
            <li><a href="index.php">home</a></li>
            <!-- <li><a href="#">service</a></li> -->
            <li><a href="about.php">about us</a></li>
            <li><a href="contact.php">contact us</a></li>
        </ul>
    </section>

    <video autoplay muted loop id="video-bg">
        <source src="images/video.mp4" type="video/mp4">
    </video>

    <!--===============Banner================-->
    <section class="banner">
        <div class="banner-text-item">
            <div class="banner-heading">
                <h1>Find Your <span>Bus.....</span> </h1>
                <p>Where would you like to go from Ambikapur?</p>
                <a href="admin/listIndex.php"><button>SEARCH </button></a>
            </div>
        </div>
    </section>

    <!--=========Services===============-->
    <section class="services">
        <div class="service-item">
            <img src="images/img-service.jpeg">
            <h2>8000+ Our Local Guides</h2>
        </div>
        <div class="service-item">
            <img src="images/img-service.jpeg">
            <h2>100% Trusted Tour Agency</h2>
        </div>
        <div class="service-item">
            <img src="images/img-service.jpeg">
            <h2>28+ Years of Travel Experience</h2>
        </div>
        <div class="service-item">
            <img src="images/img-service.jpeg">
            <h2>98% Our Travelers are Happy</h2>
        </div>
    </section>
    <!-- about -->
    <section class="about">
    <div class="about-img">
        <img src="images/img-about.jpeg" alt="About Us">
    </div>
    <div class="about-text">
        <small>ABOUT OUR COMPANY</small>
        <h2>Welcome to Bus Info - Your Trusted Travel Partner</h2>
        <p>
            At Bus Info, we believe that travel is not just about reaching a destination, but about experiencing the journey. 
            Founded with a passion for travel and a dedication to providing exceptional service, we have been helping 
            travelers explore new places and create unforgettable memories for over 28 years.
        </p>
        <p>
            Our mission is to make travel easy, affordable, and enjoyable for everyone. Whether you're looking for a 
            weekend getaway, a family vacation, or a business trip, we've got you covered with a wide range of travel 
            options and services. From local guides who know the ins and outs of their cities to reliable transportation 
            services, we ensure that your journey is smooth and hassle-free.
        </p>
        <p>
            We pride ourselves on being a 100% trusted tour agency, with over 8,000 local guides and a 98% satisfaction 
            rate among our travelers. Our experienced team is dedicated to providing personalized service and expert 
            advice to help you plan the perfect trip.
        </p>
        <h3>Why Choose Us?</h3>
        <ul>
            <li><input type="checkbox" checked> Extensive local knowledge and expertise</li>
            <li><input type="checkbox" checked> Customized travel itineraries</li>
            <li><input type="checkbox" checked> Affordable pricing and great value</li>
            <li><input type="checkbox" checked> 24/7 customer support</li>
        </ul>
        <a href="about.php">Learn More About Us</a>
    </div>
</section>


    <!--===========Footer=================-->
    <!--===========Footer=================-->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-logo">
            <h2>Bus Info</h2>
            <p>Making travel easy and enjoyable for everyone. Your trusted travel partner.</p>
            <a href="admin/signin.php" style="text-decoration:none; color:white; font-size:20;">admin login</a>
        </div>
        <div class="footer-links">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contect.php">Contact Us</a></li>
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

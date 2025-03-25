<?php
/**
 * Copyright (c) 2025 SwiftInsureX by SKB
 * License: MIT
 */
session_start();
include 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - InsurancePro</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            color: #333;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Navbar Styles */
        .navbar {
            background: rgba(0, 0, 0, 0.8);
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
        }

        .navbar .nav-links a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .navbar .nav-links a:hover {
            color: #4CAF50;
        }

        /* About Us Section */
        .about-us {
            padding: 80px 20px;
            background: #fff;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .about-us h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .about-us h2 {
            font-size: 24px;
            font-weight: 600;
            margin-top: 30px;
            margin-bottom: 15px;
        }

        .about-us p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .about-us ul {
            margin-bottom: 20px;
            padding-left: 20px;
        }

        .about-us ul li {
            margin-bottom: 10px;
        }

        /* Footer Styles */
        .footer {
            background: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="index.php" class="logo">SwiftInsureX</a>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="privacy.php">Privacy Policy</a>
            <a href="terms.php">Terms & Conditions</a>
            <a href="contact.php">Contact</a>
        </div>
    </nav>

    <!-- About Us Section -->
    <section class="about-us">
        <div class="container">
            <h1>About Us</h1>
            <p>
                At SwiftInsureX, we are dedicated to providing reliable and affordable insurance solutions to protect what matters most to you.
            </p>

            <h2>Our Mission</h2>
            <p>
                Our mission is to simplify insurance and make it accessible to everyone. We strive to offer comprehensive coverage tailored to your needs.
            </p>

            <h2>Our Team</h2>
            <p>
                Our team consists of experienced professionals who are passionate about helping you find the right insurance solutions.
            </p>

            <h2>Why Choose Us?</h2>
            <ul>
                <li>Wide range of insurance policies.</li>
                <li>Competitive premiums.</li>
                <li>24/7 customer support.</li>
            </ul>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 SwiftInsureX. All rights reserved. |  Developed by Saquib Nazeer.  |  <a href="privacy.php">Privacy Policy</a> | <a href="terms.php">Terms & Conditions</a></p>
    </footer>
</body>
</html>
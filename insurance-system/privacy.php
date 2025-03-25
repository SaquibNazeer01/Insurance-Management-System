<?php
session_start();
include 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - swiftInsureX</title>
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

        /* Privacy Policy Section */
        .privacy-policy {
            padding: 80px 20px;
            background: #fff;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .privacy-policy h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .privacy-policy h2 {
            font-size: 24px;
            font-weight: 600;
            margin-top: 30px;
            margin-bottom: 15px;
        }

        .privacy-policy p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .privacy-policy ul {
            margin-bottom: 20px;
            padding-left: 20px;
        }

        .privacy-policy ul li {
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
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact</a>
        </div>
    </nav>

    <!-- Privacy Policy Section -->
    <section class="privacy-policy">
        <div class="container">
            <h1>Privacy Policy</h1>
            <p>Last updated: March 24, 2025</p>

            <h2>Introduction</h2>
            <p>
                At SwiftInsureX, we are committed to protecting your privacy. This Privacy Policy explains how we collect, use, and safeguard your personal information when you use our services.
            </p>

            <h2>Information We Collect</h2>
            <p>
                We may collect the following types of information:
            </p>
            <ul>
                <li>Personal Information: Name, email address, phone number, etc.</li>
                <li>Usage Data: Information about how you use our website.</li>
                <li>Cookies: Data stored on your device to enhance your experience.</li>
            </ul>

            <h2>How We Use Your Information</h2>
            <p>
                We use your information to:
            </p>
            <ul>
                <li>Provide and maintain our services.</li>
                <li>Improve and personalize your experience.</li>
                <li>Communicate with you about updates and offers.</li>
            </ul>

            <h2>Security</h2>
            <p>
                We implement industry-standard security measures to protect your data. However, no method of transmission over the internet is 100% secure.
            </p>

            <h2>Changes to This Policy</h2>
            <p>
                We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new policy on this page.
            </p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
    <p>&copy; 2025 SwiftInsureX. All rights reserved. |  Developed by Saquib Nazeer.  |  <a href="privacy.php">Privacy Policy</a> | <a href="terms.php">Terms & Conditions</a></p>
    </footer>
</body>
</html>
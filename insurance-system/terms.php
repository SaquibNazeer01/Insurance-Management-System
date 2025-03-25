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
    <title>Terms & Conditions - SwiftInsureX</title>
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

        /* Terms & Conditions Section */
        .terms-conditions {
            padding: 80px 20px;
            background: #fff;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .terms-conditions h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .terms-conditions h2 {
            font-size: 24px;
            font-weight: 600;
            margin-top: 30px;
            margin-bottom: 15px;
        }

        .terms-conditions p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .terms-conditions ul {
            margin-bottom: 20px;
            padding-left: 20px;
        }

        .terms-conditions ul li {
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

    <!-- Terms & Conditions Section -->
    <section class="terms-conditions">
        <div class="container">
            <h1>Terms & Conditions</h1>
            <p>Last updated: March 24, 2025</p>

            <h2>Introduction</h2>
            <p>
                Welcome to SwiftInsureX. By accessing or using our services, you agree to comply with and be bound by these Terms & Conditions.
            </p>

            <h2>Eligibility</h2>
            <p>
                You must be at least 18 years old to use our services. By using our services, you confirm that you meet this requirement.
            </p>

            <h2>User Responsibilities</h2>
            <p>
                You agree to:
            </p>
            <ul>
                <li>Provide accurate and complete information.</li>
                <li>Use our services only for lawful purposes.</li>
                <li>Not engage in any activity that disrupts or interferes with our services.</li>
            </ul>

            <h2>Limitation of Liability</h2>
            <p>
                SwiftInsureX shall not be liable for any indirect, incidental, or consequential damages arising out of your use of our services.
            </p>

            <h2>Changes to Terms</h2>
            <p>
                We reserve the right to modify these Terms & Conditions at any time. Your continued use of our services constitutes acceptance of the updated terms.
            </p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
    <p>&copy; 2025 SwiftInsureX. All rights reserved. |  Developed by Saquib Nazeer.  |  <a href="privacy.php">Privacy Policy</a> | <a href="terms.php">Terms & Conditions</a></p>
    </footer>
</body>
</html>
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
    <title>Contact Us -SwiftInsureX.</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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

        /* Contact Section */
        .contact-section {
            padding: 80px 20px;
            background: #fff;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .contact-section h1 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 40px;
            text-align: center;
        }

        .contact-section .contact-company,
        .contact-section .contact-developer {
            margin-bottom: 40px;
        }

        .contact-section h2 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .contact-section p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .contact-section .social-links {
            display: flex;
            gap: 20px;
        }

        .contact-section .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: #4CAF50;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s ease;
        }

        .contact-section .social-links a:hover {
            background: #45a049;
        }

        .contact-section .social-links i {
            color: #fff;
            font-size: 20px;
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
            <a href="privacy.php">Privacy Policy</a>
            <a href="terms.php">Terms & Conditions</a>
        </div>
    </nav>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <h1>Contact Us</h1>

            <!-- Contact Company -->
            <div class="contact-company">
                <h2>Contact Company</h2>
                <p><strong>Email:</strong> bhatsaakib505.com</p>
                <p><strong>Phone:</strong> +91 8899779073</p>
            </div>

            <!-- Contact Developer -->
            <div class="contact-developer">
                <h2>Contact Developer</h2>
                <div class="social-links">
                    <a href="https://linkedin.com/bhat_saakib019" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <a href="https://hackerrank.com/SaquibNazeer01" target="_blank"><i class="fab fa-hackerrank"></i></a>
                    <a href="https://instagram.com/Bhat_Saakib019" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="mailto:dbhatsaakib505@gmail.com"><i class="fas fa-envelope"></i></a>
                    <a href="https://facebook.com/" target="_blank"><i class="fab fa-facebook"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
    <p>&copy; 2025 SwiftInsureX. All rights reserved. |  Developed by Saquib Nazeer.  |  <a href="privacy.php">Privacy Policy</a> | <a href="terms.php">Terms & Conditions</a></p>
    </footer>
</body>
</html>
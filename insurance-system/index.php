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
    <title>SwiftInsureX</title>
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
            display: flex;
            align-items: center;
            font-size: 24px;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
        }

        .navbar .logo img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
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

        .navbar .nav-links .login-btn {
            background: #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
            color: #fff;
            margin-left: 10px;
        }

        .navbar .nav-links .login-btn:hover {
            background: #45a049;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: url('assets/images/hero-bg.jpg') no-repeat center center/cover;
            color: #333; /* Updated font color */
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #333; /* Updated font color */
        }

        .hero p {
            font-size: 20px;
            font-weight: 400;
            margin-bottom: 40px;
            color: #333; /* Updated font color */
        }

        .hero .btn {
            background: #4CAF50;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .hero .btn:hover {
            background: #45a049;
        }

        /* Features Section */
        .features {
            padding: 80px 40px;
            background: #fff;
            text-align: center;
        }

        .features h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 40px;
        }

        .features .feature-cards {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .features .card {
            background: #f9f9f9;
            padding: 30px;
            border-radius: 10px;
            width: 30%;
            margin: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .features .card:hover {
            transform: translateY(-10px);
        }

        .features .card i {
            font-size: 40px;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .features .card h3 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .features .card p {
            font-size: 16px;
            color: #666;
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

        /* Responsive Styles */
        @media (max-width: 768px) {
            .features .card {
                width: 100%;
                margin: 10px 0;
            }

            .hero h1 {
                font-size: 36px;
            }

            .hero p {
                font-size: 18px;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 28px;
            }

            .hero p {
                font-size: 16px;
            }

            .features h2 {
                font-size: 28px;
            }

            .features .card h3 {
                font-size: 20px;
            }

            .features .card p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="index.php" class="logo">
            <img src="assets/images/logo.png" alt="InsurancePro Logo">
            SwiftInsureX
        </a>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="contact.php">Contact</a>
            <a href="login.php" class="login-btn">Login</a>
            <a href="admin_login.php" class="login-btn">Admin Login</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div>
            <h1>Your Trusted Insurance Partner</h1>
            <p>Protecting what matters most with reliable and affordable insurance solutions.</p>
            <a href="register.php" class="btn">Get Started</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <h2>Why Choose Us?</h2>
        <div class="feature-cards">
            <div class="card">
                <i class="fas fa-shield-alt"></i>
                <h3>Comprehensive Coverage</h3>
                <p>We offer a wide range of insurance policies to meet your unique needs.</p>
            </div>
            <div class="card">
                <i class="fas fa-hand-holding-usd"></i>
                <h3>Affordable Premiums</h3>
                <p>Get the best coverage at competitive prices tailored for you.</p>
            </div>
            <div class="card">
                <i class="fas fa-headset"></i>
                <h3>24/7 Support</h3>
                <p>Our dedicated team is always here to assist you, anytime, anywhere.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 SwiftInsureX, All rights reserved. |  Developed by Saquib Nazeer.  | <a href="privacy.php">Privacy Policy</a> | <a href="terms.php">Terms & Conditions</a></p>
    </footer>
</body>
</html>
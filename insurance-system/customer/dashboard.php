<?php
/**
 * Copyright (c) 2025 SwiftInsureX by SKB
 * License: MIT
 */
session_start();
include '../includes/db.php';

// Redirect if not logged in as customer
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'customer') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main class="dashboard-main">
        <div class="dashboard-container">
            <h1 class="dashboard-title">Welcome, Customer</h1>

            <!-- Dashboard Cards -->
            <div class="dashboard-cards">
                <div class="card card-policy">
                    <i class="fas fa-file-contract"></i>
                    <h2>My Policies</h2>
                    <p>View your insurance policies.</p>
                    <a href="policies.php" class="btn">Go</a>
                </div>
                <div class="card card-claim">
                    <i class="fas fa-hand-holding-usd"></i>
                    <h2>My Claims</h2>
                    <p>View and manage your claims.</p>
                    <a href="claims.php" class="btn">Go</a>
                </div>
                <div class="card card-payment">
                    <i class="fas fa-money-bill-wave"></i>
                    <h2>Make Payment</h2>
                    <p>Make payments for your claims.</p>
                    <a href="make_payment.php" class="btn">Go</a>
                </div>
                <div class="card card-history">
                    <i class="fas fa-money-bill-wave"></i>
                    <h2>Payment History</h2>
                    <p>View your payment history.</p>
                    <a href="payments.php" class="btn">Go</a>
                </div>
                <div class="card card-feedback">
                    <i class="fas fa-comment-dots"></i>
                    <h2>Feedback</h2>
                    <p>Share your feedback with us.</p>
                    <a href="feedback.php" class="btn">Go</a>
                </div>
                <div class="card card-faqs">
                    <i class="fas fa-question-circle"></i>
                    <h2>FAQs</h2>
                    <p>Ask questions or view answers.</p>
                    <a href="faqs.php" class="btn">Go</a>
                </div>
                <div class="card card-terms">
                    <i class="fas fa-file-alt"></i>
                    <h2>Terms & Conditions</h2>
                    <p>View terms and conditions.</p>
                    <a href="../terms.php" class="btn">Go</a>
                </div>
                <!-- New Offer Zone Card -->
                <div class="card card-offer-zone">
                    <i class="fas fa-gift"></i>
                    <h2>Offer Zone</h2>
                    <p>View current offers.</p>
                    <a href="view_offers.php" class="btn">Go</a>
                </div>
                <!-- New Announcements Card -->
                <div class="card card-announcements">
                    <i class="fas fa-bullhorn"></i>
                    <h2>Announcements</h2>
                    <p>View important announcements.</p>
                    <a href="view_announcements.php" class="btn">Go</a>
                </div>
                <!-- New Chat Bot Card -->
                <div class="card card-chat-bot">
                    <i class="fas fa-robot"></i> <!-- Robot icon for chatbot -->
                    <h2>Chat Bot</h2>
                    <p>Get instant help from our chat bot.</p>
                    <a href="chatbot.php" class="btn">Go</a>
                </div>
            </div>
        </div>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
<?php
/**
 * Copyright (c) 2025 SwiftInsureX by SKB
 * License: MIT
 */
session_start();
include '../includes/db.php';

// Redirect if not logged in as agent
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'agent') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main class="dashboard-main">
        <div class="dashboard-container">
            <h1 class="dashboard-title">Welcome, Agent</h1>

            <!-- Dashboard Cards -->
            <div class="dashboard-cards">
                <div class="card">
                    <i class="fas fa-users"></i>
                    <h2>Manage Customers</h2>
                    <p>Add, edit, or delete customers.</p>
                    <a href="manage_customers.php" class="btn">Go</a>
                </div>
                <div class="card">
                    <i class="fas fa-file-contract"></i>
                    <h2>Manage Policies</h2>
                    <p>Add, edit, or delete policies.</p>
                    <a href="policies.php" class="btn">Go</a>
                </div>
                <div class="card">
                    <i class="fas fa-hand-holding-usd"></i>
                    <h2>Submit Claims</h2>
                    <p>Submit claims on behalf of customers.</p>
                    <a href="add_claim.php" class="btn">Go</a>
                </div>
                <div class="card">
                    <i class="fas fa-money-bill-wave"></i>
                    <h2>View Payments</h2>
                    <p>View payment details.</p>
                    <a href="view_payments.php" class="btn">Go</a>
                </div>
                <!-- New FAQs Card -->
                <div class="card">
                    <i class="fas fa-question-circle"></i>
                    <h2>FAQs</h2>
                    <p>Ask questions or view answers.</p>
                    <a href="faqs.php" class="btn">Go</a>
                </div>
                <!-- New Terms & Conditions Card -->
                <div class="card">
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
            </div>
        </div>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
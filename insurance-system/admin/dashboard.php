<?php
/**
 * Copyright (c) 2025 SwiftInsureX by SKB
 * License: MIT
 */
session_start();
include '../includes/db.php';

// Redirect if not logged in as admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

// Fetch quick stats
$sql = "SELECT COUNT(id) AS total_agents FROM agents";
$total_agents = $conn->query($sql)->fetch_assoc()['total_agents'];

$sql = "SELECT COUNT(id) AS total_customers FROM customers";
$total_customers = $conn->query($sql)->fetch_assoc()['total_customers'];

$sql = "SELECT COUNT(id) AS total_policies FROM policies";
$total_policies = $conn->query($sql)->fetch_assoc()['total_policies'];

$sql = "SELECT COUNT(id) AS total_claims FROM claims";
$total_claims = $conn->query($sql)->fetch_assoc()['total_claims'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main class="dashboard-main">
        <div class="dashboard-container">
            <h1 class="dashboard-title">Welcome, Admin</h1>

            <!-- Quick Stats -->
            <div class="dashboard-cards">
                <div class="card card-agents">
                    <i class="fas fa-users"></i>
                    <h2>Total Agents</h2>
                    <p><?php echo $total_agents; ?></p>
                </div>
                <div class="card card-customers">
                    <i class="fas fa-users"></i>
                    <h2>Total Customers</h2>
                    <p><?php echo $total_customers; ?></p>
                </div>
                <div class="card card-policies">
                    <i class="fas fa-file-contract"></i>
                    <h2>Total Policies</h2>
                    <p><?php echo $total_policies; ?></p>
                </div>
                <div class="card card-claims">
                    <i class="fas fa-hand-holding-usd"></i>
                    <h2>Total Claims</h2>
                    <p><?php echo $total_claims; ?></p>
                </div>
            </div>

            <!-- Dashboard Cards -->
            <div class="dashboard-cards">
                <div class="card card-manage-agents">
                    <i class="fas fa-users"></i>
                    <h2>Manage Agents</h2>
                    <p>Add, edit, or delete agents.</p>
                    <a href="manage_agents.php" class="btn">Go</a>
                </div>
                <div class="card card-manage-customers">
                    <i class="fas fa-users"></i>
                    <h2>Manage Customers</h2>
                    <p>View and manage customers.</p>
                    <a href="manage_customers.php" class="btn">Go</a>
                </div>
                <div class="card card-manage-claims">
                    <i class="fas fa-hand-holding-usd"></i>
                    <h2>Manage Claims</h2>
                    <p>Approve or reject claims.</p>
                    <a href="claims.php" class="btn">Go</a>
                </div>
                <div class="card card-reports">
                    <i class="fas fa-chart-bar"></i>
                    <h2>Reports</h2>
                    <p>Generate reports for claims and payments.</p>
                    <a href="reports.php" class="btn">Go</a>
                </div>
                <!-- New FAQs Card -->
                <div class="card card-faqs">
                    <i class="fas fa-question-circle"></i>
                    <h2>FAQs</h2>
                    <p>Answer questions from agents and customers.</p>
                    <a href="faqs.php" class="btn">Go</a>
                </div>
                <!-- New Terms & Conditions Card -->
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
                    <p>Add or manage offers for policies.</p>
                    <a href="offer_zone.php" class="btn">Go</a>
                </div>
                <!-- New Announcements Card -->
                <div class="card card-announcements">
                    <i class="fas fa-bullhorn"></i>
                    <h2>Announcements</h2>
                    <p>Add or manage important announcements.</p>
                    <a href="announcements.php" class="btn">Go</a>
                </div>
            </div>
        </div>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
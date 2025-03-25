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

// Fetch agent_id from the agents table using user_id
$user_id = $_SESSION['user_id'];
$sql = "SELECT id FROM agents WHERE user_id=$user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $agent_id = $row['id'];
} else {
    die("Error: Agent not found.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = $_POST['customer_id'];
    $policy_id = $_POST['policy_id'];
    $claim_amount = $_POST['claim_amount'];

    // Insert claim into the database
    $sql = "INSERT INTO claims (policy_id, customer_id, claim_amount, agent_id) 
            VALUES ($policy_id, $customer_id, $claim_amount, $agent_id)";
    if ($conn->query($sql)) {
        // Insert notification for the admin
        $message = "New claim submitted by Agent.";
        $sql = "INSERT INTO notifications (user_id, message) VALUES ((SELECT id FROM users WHERE role='admin'), '$message')";
        if ($conn->query($sql)) {
            echo "<script>alert('Claim submitted successfully!'); window.location.href='claims.php';</script>";
        } else {
            echo "<script>alert('Error inserting notification: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Error submitting claim: " . $conn->error . "');</script>";
    }
}

// Fetch customers
$sql = "SELECT * FROM customers";
$customers = $conn->query($sql);

// Fetch policies
$sql = "SELECT * FROM policies";
$policies = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit New Claim</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main class="dashboard-main">
        <div class="dashboard-container">
            <h1 class="dashboard-title">Submit New Claim</h1>
            <form method="POST" class="form">
                <div class="form-group">
                    <label for="customer_id">Customer</label>
                    <select name="customer_id" id="customer_id" required>
                        <?php while ($row = $customers->fetch_assoc()): ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="policy_id">Policy</label>
                    <select name="policy_id" id="policy_id" required>
                        <?php while ($row = $policies->fetch_assoc()): ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['policy_type']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="claim_amount">Claim Amount</label>
                    <input type="number" name="claim_amount" id="claim_amount" required>
                </div>
                <button type="submit" class="btn-add">Submit Claim</button>
            </form>
        </div>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
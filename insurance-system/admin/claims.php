<?php
session_start();
include '../includes/db.php';

// Redirect if not logged in as admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

// Handle claim status update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $claim_id = $_POST['claim_id'];
    $status = $_POST['status'];

    $sql = "UPDATE claims SET status='$status' WHERE id=$claim_id";
    if ($conn->query($sql)) {
        echo "<script>alert('Claim status updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating claim status: " . $conn->error . "');</script>";
    }
}

// Fetch all claims with payment status
$sql = "SELECT claims.*, policies.policy_type, customers.name AS customer_name, 
               agents.name AS agent_name, payments.status AS payment_status
        FROM claims 
        JOIN policies ON claims.policy_id = policies.id 
        JOIN customers ON claims.customer_id = customers.id 
        JOIN agents ON claims.agent_id = agents.id
        LEFT JOIN payments ON claims.id = payments.claim_id
        ORDER BY claims.submitted_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Claims</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .payment-status {
            font-weight: bold;
        }
        .payment-status.paid {
            color: #28a745; /* Green */
        }
        .payment-status.unpaid {
            color: #dc3545; /* Red */
        }
    </style>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main class="dashboard-main">
        <div class="dashboard-container">
            <h1 class="dashboard-title">Manage Claims</h1>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Policy Type</th>
                            <th>Claim Amount</th>
                            
                            <th>Status</th>
                            <th>Submitted By</th>
                            <th>Submitted At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['customer_name']; ?></td>
                                <td><?php echo $row['policy_type']; ?></td>
                                <td>$<?php echo number_format($row['claim_amount'], 2); ?></td>
                                
                                <td><?php echo ucfirst($row['status']); ?></td>
                                <td><?php echo $row['agent_name']; ?></td>
                                <td><?php echo $row['submitted_at']; ?></td>
                                <td>
                                    <form method="POST" style="display:inline;">
                                        <input type="hidden" name="claim_id" value="<?php echo $row['id']; ?>">
                                        <select name="status" onchange="this.form.submit()">
                                            <option value="Pending" <?php echo ($row['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                            <option value="Approved" <?php echo ($row['status'] == 'Approved') ? 'selected' : ''; ?>>Approved</option>
                                            <option value="Rejected" <?php echo ($row['status'] == 'Rejected') ? 'selected' : ''; ?>>Rejected</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
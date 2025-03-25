<?php
include '../includes/db.php';

// Fetch claims data
$sql = "SELECT claims.*, policies.policy_type, customers.name AS customer_name 
        FROM claims 
        JOIN policies ON claims.policy_id = policies.id 
        JOIN customers ON policies.customer_id = customers.id";
$claims = $conn->query($sql);

// Fetch payments data
$sql = "SELECT payments.*, policies.policy_type, customers.name AS customer_name 
        FROM payments 
        JOIN policies ON payments.policy_id = policies.id 
        JOIN customers ON policies.customer_id = customers.id";
$payments = $conn->query($sql);

// Prepare data for charts
// Claims by status
$sql = "SELECT status, COUNT(*) as count FROM claims GROUP BY status";
$claims_status = $conn->query($sql);
$claims_labels = [];
$claims_data = [];
while ($row = $claims_status->fetch_assoc()) {
    $claims_labels[] = $row['status'];
    $claims_data[] = $row['count'];
}

// Payments by policy type
$sql = "SELECT policy_type, COUNT(*) as count FROM payments JOIN policies ON payments.policy_id = policies.id GROUP BY policy_type";
$payments_policy_type = $conn->query($sql);
$payments_labels = [];
$payments_data = [];
while ($row = $payments_policy_type->fetch_assoc()) {
    $payments_labels[] = $row['policy_type'];
    $payments_data[] = $row['count'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main class="dashboard-main">
        <div class="dashboard-container">
            <h1 class="dashboard-title">Reports</h1>

            <!-- Claims Report -->
            <div class="report-section">
                <h2>Claims Report</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Policy Type</th>
                            <th>Claim Amount</th>
                            <th>Status</th>
                            <th>Submitted At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $claims->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['customer_name']; ?></td>
                                <td><?php echo $row['policy_type']; ?></td>
                                <td><?php echo $row['claim_amount']; ?></td>
                                <td><?php echo $row['status']; ?></td>
                                <td><?php echo $row['submitted_at']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <!-- Claims Chart -->
                <div style="width: 50%; margin: 20px auto;">
                    <canvas id="claimsChart"></canvas>
                </div>
            </div>

            <!-- Payments Report -->
            <div class="report-section">
                <h2>Payments Report</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer</th>
                            <th>Policy Type</th>
                            <th>Amount</th>
                            <th>Payment Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $payments->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['customer_name']; ?></td>
                                <td><?php echo $row['policy_type']; ?></td>
                                <td><?php echo $row['amount']; ?></td>
                                <td><?php echo $row['payment_date']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <!-- Payments Chart -->
                <div style="width: 50%; margin: 20px auto;">
                    <canvas id="paymentsChart"></canvas>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Claims Chart (Pie Chart)
        const claimsCtx = document.getElementById('claimsChart').getContext('2d');
        const claimsChart = new Chart(claimsCtx, {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($claims_labels); ?>,
                datasets: [{
                    label: 'Claims by Status',
                    data: <?php echo json_encode($claims_data); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Claims by Status'
                    }
                }
            }
        });

        // Payments Chart (Bar Chart)
        const paymentsCtx = document.getElementById('paymentsChart').getContext('2d');
        const paymentsChart = new Chart(paymentsCtx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($payments_labels); ?>,
                datasets: [{
                    label: 'Payments by Policy Type',
                    data: <?php echo json_encode($payments_data); ?>,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Payments by Policy Type'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <?php include '../includes/footer.php'; ?>
</body>
</html>
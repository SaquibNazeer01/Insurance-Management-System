<?php
include '../includes/header.php';
include '../includes/db.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT payments.*, policies.policy_type 
        FROM payments 
        JOIN policies ON payments.policy_id = policies.id 
        JOIN customers ON policies.customer_id = customers.id 
        WHERE customers.user_id=$user_id";
$result = $conn->query($sql);
?>

<main class="dashboard-main">
    <div class="dashboard-container">
        <h1 class="dashboard-title">My Payments</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Policy Type</th>
                        <th>Amount</th>
                        <th>Payment Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['policy_type']; ?></td>
                            <td><?php echo $row['amount']; ?></td>
                            <td><?php echo $row['payment_date']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php
include '../includes/footer.php';
?>
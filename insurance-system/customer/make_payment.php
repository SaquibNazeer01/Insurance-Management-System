<?php
include '../includes/header.php';
include '../includes/db.php';

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $claim_id = $_POST['claim_id'];
    $amount = $_POST['amount'];

    // Insert payment record
    $sql = "INSERT INTO payments (policy_id, amount) 
            VALUES ((SELECT policy_id FROM claims WHERE id=$claim_id), $amount)";
    if ($conn->query($sql)) {
        // Update claim payment status
        $sql = "UPDATE claims SET payment_status='Completed' WHERE id=$claim_id";
        if ($conn->query($sql)) {
            echo "<script>alert('Payment completed successfully!'); window.location.href='payments.php';</script>";
        } else {
            echo "<script>alert('Error updating claim status: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Error processing payment: " . $conn->error . "');</script>";
    }
}

// Fetch customer's claims
$sql = "SELECT claims.*, policies.policy_type 
        FROM claims 
        JOIN policies ON claims.policy_id = policies.id 
        JOIN customers ON policies.customer_id = customers.id 
        WHERE customers.user_id=$user_id AND claims.payment_status='Pending'";
$result = $conn->query($sql);
?>

<main class="dashboard-main">
    <div class="dashboard-container">
        <h1 class="dashboard-title">Make Payment</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Policy Type</th>
                        <th>Claim Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['policy_type']; ?></td>
                            <td><?php echo $row['claim_amount']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="claim_id" value="<?php echo $row['id']; ?>">
                                    <input type="number" name="amount" placeholder="Amount" required>
                                    <button type="submit" class="btn-pay">Pay Now</button>
                                </form>
                            </td>
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
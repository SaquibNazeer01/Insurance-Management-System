<?php
include '../includes/header.php';
include '../includes/db.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT claims.*, policies.policy_type, agents.name AS agent_name 
        FROM claims 
        JOIN policies ON claims.policy_id = policies.id 
        JOIN agents ON claims.agent_id = agents.id 
        JOIN customers ON policies.customer_id = customers.id 
        WHERE customers.user_id=$user_id";
$result = $conn->query($sql);
?>

<main class="dashboard-main">
    <div class="dashboard-container">
        <h1 class="dashboard-title">My Claims</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Policy Type</th>
                        <th>Claim Amount</th>
                        <th>Status</th>
                        <th>Submitted By</th>
                        <th>Submitted At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['policy_type']; ?></td>
                            <td><?php echo $row['claim_amount']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['agent_name']; ?></td>
                            <td><?php echo $row['submitted_at']; ?></td>
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
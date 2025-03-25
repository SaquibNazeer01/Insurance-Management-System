<?php
include '../includes/header.php';
include '../includes/db.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT policies.*, customers.name AS customer_name 
        FROM policies 
        JOIN customers ON policies.customer_id = customers.id 
        WHERE customers.user_id=$user_id";
$result = $conn->query($sql);
?>

<main class="dashboard-main">
    <div class="dashboard-container">
        <h1 class="dashboard-title">My Policies</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Policy Type</th>
                        <th>Premium Amount</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['policy_type']; ?></td>
                            <td><?php echo $row['premium_amount']; ?></td>
                            <td><?php echo $row['start_date']; ?></td>
                            <td><?php echo $row['end_date']; ?></td>
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
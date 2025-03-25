<?php
include '../includes/header.php';
include '../includes/db.php';

// Fetch policies
$sql = "SELECT policies.*, customers.name AS customer_name 
        FROM policies 
        JOIN customers ON policies.customer_id = customers.id";
$result = $conn->query($sql);
?>

<main class="dashboard-main">
    <div class="dashboard-container">
        <h1 class="dashboard-title">Policies</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer</th>
                        <th>Policy Type</th>
                        <th>Premium Amount</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['customer_name']; ?></td>
                            <td><?php echo $row['policy_type']; ?></td>
                            <td><?php echo $row['premium_amount']; ?></td>
                            <td><?php echo $row['start_date']; ?></td>
                            <td><?php echo $row['end_date']; ?></td>
                            <td>
                                <a href="edit_policy.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                                <a href="delete_policy.php?id=<?php echo $row['id']; ?>" class="btn-delete">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <a href="add_policy.php" class="btn-add">Add New Policy</a>
        </div>
    </div>
</main>

<?php
include '../includes/footer.php';
?>
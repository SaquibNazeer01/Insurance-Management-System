<?php
include '../includes/header.php';
include '../includes/db.php';

// Fetch customers
$sql = "SELECT * FROM customers";
$result = $conn->query($sql);
?>

<main class="dashboard-main">
    <div class="dashboard-container">
        <h1 class="dashboard-title">Manage Customers</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td>
                                <a href="edit_customer.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                                <a href="delete_customer.php?id=<?php echo $row['id']; ?>" class="btn-delete">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <a href="add_customer.php" class="btn-add">Add New Customer</a>
        </div>
    </div>
</main>

<?php
include '../includes/footer.php';
?>
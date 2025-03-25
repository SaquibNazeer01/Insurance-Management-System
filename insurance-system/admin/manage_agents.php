<?php
include '../includes/header.php';
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO agents (user_id, name, email, phone) VALUES (1, '$name', '$email', '$phone')"; // Replace 1 with actual user_id
    if ($conn->query($sql)) {
        echo "<script>alert('Agent added successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

$sql = "SELECT * FROM agents";
$result = $conn->query($sql);
?>

<main class="dashboard-main">
    <div class="dashboard-container">
        <h1 class="dashboard-title">Manage Agents</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
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
                            <td>
                                <a href="edit_agent.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                                <a href="delete_agent.php?id=<?php echo $row['id']; ?>" class="btn-delete">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <a href="add_agent.php" class="btn-add">Add New Agent</a>
        </div>
    </div>
</main>

<?php
include '../includes/footer.php';
?>
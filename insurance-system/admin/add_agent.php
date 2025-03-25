<?php
include '../includes/header.php';
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO agents (user_id, name, email, phone) VALUES (1, '$name', '$email', '$phone')"; // Replace 1 with actual user_id
    if ($conn->query($sql)) {
        echo "<script>alert('Agent added successfully!'); window.location.href='manage_agents.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?>

<main class="dashboard-main">
    <div class="dashboard-container">
        <h1 class="dashboard-title">Add New Agent</h1>
        <form method="POST" class="form">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" required>
            </div>
            <button type="submit" class="btn-add">Add Agent</button>
        </form>
    </div>
</main>

<?php
include '../includes/footer.php';
?>
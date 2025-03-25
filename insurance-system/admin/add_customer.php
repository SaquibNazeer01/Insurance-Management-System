<?php
include '../includes/header.php';
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO customers (user_id, name, email, phone, address) 
            VALUES (1, '$name', '$email', '$phone', '$address')"; // Replace 1 with actual user_id
    if ($conn->query($sql)) {
        echo "<script>alert('Customer added successfully!'); window.location.href='manage_customers.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?>

<main class="dashboard-main">
    <div class="dashboard-container">
        <h1 class="dashboard-title">Add New Customer</h1>
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
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" required></textarea>
            </div>
            <button type="submit" class="btn-add">Add Customer</button>
        </form>
    </div>
</main>

<?php
include '../includes/footer.php';
?>
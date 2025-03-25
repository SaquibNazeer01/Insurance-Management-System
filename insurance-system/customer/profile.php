<?php
include '../includes/header.php';
include '../includes/db.php';

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "UPDATE customers SET name='$name', email='$email', phone='$phone', address='$address' WHERE user_id=$user_id";
    if ($conn->query($sql)) {
        echo "<script>alert('Profile updated successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

$sql = "SELECT * FROM customers WHERE user_id=$user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $customer = $result->fetch_assoc();
} else {
    die("Error: Customer not found.");
}
?>

<main class="dashboard-main">
    <div class="dashboard-container">
        <h1 class="dashboard-title">My Profile</h1>
        <form method="POST" class="form">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?php echo $customer['name'] ?? ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $customer['email'] ?? ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" value="<?php echo $customer['phone'] ?? ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" required><?php echo $customer['address'] ?? ''; ?></textarea>
            </div>
            <button type="submit" class="btn-edit">Update Profile</button>
        </form>
    </div>
</main>

<?php
include '../includes/footer.php';
?>
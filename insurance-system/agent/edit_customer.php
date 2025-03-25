<?php
include '../includes/header.php';
include '../includes/db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "UPDATE customers SET name='$name', email='$email', phone='$phone', address='$address' WHERE id=$id";
    if ($conn->query($sql)) {
        echo "<script>alert('Customer updated successfully!'); window.location.href='manage_customers.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

$sql = "SELECT * FROM customers WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<main class="dashboard-main">
    <div class="dashboard-container">
        <h1 class="dashboard-title">Edit Customer</h1>
        <form method="POST" class="form">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" value="<?php echo $row['phone']; ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" required><?php echo $row['address']; ?></textarea>
            </div>
            <button type="submit" class="btn-edit">Update Customer</button>
        </form>
    </div>
</main>

<?php
include '../includes/footer.php';
?>
<?php
include '../includes/header.php';
include '../includes/db.php';

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE agents SET name='$name', email='$email', phone='$phone' WHERE user_id=$user_id";
    if ($conn->query($sql)) {
        echo "<script>alert('Profile updated successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

$sql = "SELECT * FROM agents WHERE user_id=$user_id";
$result = $conn->query($sql);
$agent = $result->fetch_assoc();
?>

<main class="dashboard-main">
    <div class="dashboard-container">
        <h1 class="dashboard-title">My Profile</h1>
        <form method="POST" class="form">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?php echo $agent['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $agent['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" value="<?php echo $agent['phone']; ?>" required>
            </div>
            <button type="submit" class="btn-edit">Update Profile</button>
        </form>
    </div>
</main>

<?php
include '../includes/footer.php';
?>
<?php
include '../includes/header.php';
include '../includes/db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = $_POST['customer_id'];
    $policy_type = $_POST['policy_type'];
    $premium_amount = $_POST['premium_amount'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $sql = "UPDATE policies SET customer_id=$customer_id, policy_type='$policy_type', premium_amount=$premium_amount, start_date='$start_date', end_date='$end_date' WHERE id=$id";
    if ($conn->query($sql)) {
        echo "<script>alert('Policy updated successfully!'); window.location.href='policies.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

$sql = "SELECT * FROM policies WHERE id=$id";
$result = $conn->query($sql);
$policy = $result->fetch_assoc();

$sql = "SELECT * FROM customers";
$customers = $conn->query($sql);
?>

<main class="dashboard-main">
    <div class="dashboard-container">
        <h1 class="dashboard-title">Edit Policy</h1>
        <form method="POST" class="form">
            <div class="form-group">
                <label for="customer_id">Customer</label>
                <select name="customer_id" id="customer_id" required>
                    <?php while ($row = $customers->fetch_assoc()): ?>
                        <option value="<?php echo $row['id']; ?>" <?php echo ($row['id'] == $policy['customer_id']) ? 'selected' : ''; ?>><?php echo $row['name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="policy_type">Policy Type</label>
                <input type="text" name="policy_type" id="policy_type" value="<?php echo $policy['policy_type']; ?>" required>
            </div>
            <div class="form-group">
                <label for="premium_amount">Premium Amount</label>
                <input type="number" name="premium_amount" id="premium_amount" value="<?php echo $policy['premium_amount']; ?>" required>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" name="start_date" id="start_date" value="<?php echo $policy['start_date']; ?>" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" name="end_date" id="end_date" value="<?php echo $policy['end_date']; ?>" required>
            </div>
            <button type="submit" class="btn-edit">Update Policy</button>
        </form>
    </div>
</main>

<?php
include '../includes/footer.php';
?>
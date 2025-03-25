<?php
include '../includes/header.php';
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $policy_id = $_POST['policy_id'];
    $amount = $_POST['amount'];

    $sql = "INSERT INTO payments (policy_id, amount) 
            VALUES ($policy_id, $amount)";
    if ($conn->query($sql)) {
        echo "<script>alert('Payment added successfully!'); window.location.href='view_payments.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

$sql = "SELECT * FROM policies";
$policies = $conn->query($sql);
?>

<main class="dashboard-main">
    <div class="dashboard-container">
        <h1 class="dashboard-title">Add New Payment</h1>
        <form method="POST" class="form">
            <div class="form-group">
                <label for="policy_id">Policy</label>
                <select name="policy_id" id="policy_id" required>
                    <?php while ($row = $policies->fetch_assoc()): ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['policy_type']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" name="amount" id="amount" required>
            </div>
            <button type="submit" class="btn-add">Add Payment</button>
        </form>
    </div>
</main>

<?php
include '../includes/footer.php';
?>
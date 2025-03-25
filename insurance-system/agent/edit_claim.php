<?php
include '../includes/header.php';
include '../includes/db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $policy_id = $_POST['policy_id'];
    $claim_amount = $_POST['claim_amount'];

    $sql = "UPDATE claims SET policy_id=$policy_id, claim_amount=$claim_amount WHERE id=$id";
    if ($conn->query($sql)) {
        echo "<script>alert('Claim updated successfully!'); window.location.href='claims.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}

$sql = "SELECT * FROM claims WHERE id=$id";
$result = $conn->query($sql);
$claim = $result->fetch_assoc();

$sql = "SELECT * FROM policies";
$policies = $conn->query($sql);
?>

<main class="dashboard-main">
    <div class="dashboard-container">
        <h1 class="dashboard-title">Edit Claim</h1>
        <form method="POST" class="form">
            <div class="form-group">
                <label for="policy_id">Policy</label>
                <select name="policy_id" id="policy_id" required>
                    <?php while ($row = $policies->fetch_assoc()): ?>
                        <option value="<?php echo $row['id']; ?>" <?php echo ($row['id'] == $claim['policy_id']) ? 'selected' : ''; ?>><?php echo $row['policy_type']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="claim_amount">Claim Amount</label>
                <input type="number" name="claim_amount" id="claim_amount" value="<?php echo $claim['claim_amount']; ?>" required>
            </div>
            <button type="submit" class="btn-edit">Update Claim</button>
        </form>
    </div>
</main>

<?php
include '../includes/footer.php';
?>
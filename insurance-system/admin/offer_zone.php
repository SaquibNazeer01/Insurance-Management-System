<?php
session_start();
include '../includes/db.php';

// Redirect if not logged in as admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

// Handle form submission for adding offers
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $policy_id = $_POST['policy_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $sql = "INSERT INTO offers (title, description, policy_id, start_date, end_date) 
            VALUES ('$title', '$description', '$policy_id', '$start_date', '$end_date')";
    $conn->query($sql);
}

// Fetch all offers
$sql = "SELECT * FROM offers ORDER BY created_at DESC";
$offers = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offer Zone</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main class="dashboard-main">
        <div class="dashboard-container">
            <h1 class="dashboard-title">Offer Zone</h1>

            <!-- Add Offer Form -->
            <form method="POST" class="form">
                <h2>Add New Offer</h2>
                <input type="text" name="title" placeholder="Offer Title" required>
                <textarea name="description" placeholder="Offer Description" required></textarea>
                <input type="number" name="policy_id" placeholder="Policy ID (optional)">
                <input type="date" name="start_date" placeholder="Start Date" required>
                <input type="date" name="end_date" placeholder="End Date" required>
                <button type="submit">Add Offer</button>
            </form>

            <!-- List of Offers -->
            <div class="recent-activity">
                <h2>Current Offers</h2>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $offers->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td><?php echo $row['start_date']; ?></td>
                                    <td><?php echo $row['end_date']; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
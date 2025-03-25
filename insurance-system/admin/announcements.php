<?php
session_start();
include '../includes/db.php';

// Redirect if not logged in as admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

// Handle form submission for adding announcements
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO announcements (title, description) 
            VALUES ('$title', '$description')";
    $conn->query($sql);
}

// Fetch all announcements
$sql = "SELECT * FROM announcements ORDER BY created_at DESC";
$announcements = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main class="dashboard-main">
        <div class="dashboard-container">
            <h1 class="dashboard-title">Announcements</h1>

            <!-- Add Announcement Form -->
            <form method="POST" class="form">
                <h2>Add New Announcement</h2>
                <input type="text" name="title" placeholder="Announcement Title" required>
                <textarea name="description" placeholder="Announcement Description" required></textarea>
                <button type="submit">Add Announcement</button>
            </form>

            <!-- List of Announcements -->
            <div class="recent-activity">
                <h2>Current Announcements</h2>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $announcements->fetch_assoc()): ?>
                                <tr>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td><?php echo $row['created_at']; ?></td>
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
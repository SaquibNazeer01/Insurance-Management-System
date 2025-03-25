<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'includes/db.php';

// Fetch notifications for the logged-in user
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM notifications WHERE user_id='$user_id' ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .notification {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .notification.unread {
            background-color: #e3f2fd;
        }
        .notification.read {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main class="dashboard-main">
        <div class="dashboard-container">
            <h1>Notifications</h1>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $status_class = $row['status'] === 'unread' ? 'unread' : 'read';
                    echo "<div class='notification $status_class'>
                            <p>{$row['message']}</p>
                            <small>{$row['created_at']}</small>
                            <a href='mark_notification_as_read.php?id={$row['id']}'>Mark as Read</a>
                          </div>";
                }
            } else {
                echo "<p>No notifications found.</p>";
            }
            ?>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
<?php
$conn->close();
?>
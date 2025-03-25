<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    die(json_encode(['error' => 'Unauthorized access!']));
}

$user_id = $_SESSION['user_id'];

// Fetch notifications for the logged-in user
$sql = "SELECT * FROM notifications WHERE user_id='$user_id' ORDER BY created_at DESC";
$result = $conn->query($sql);

$notifications = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $notifications[] = [
            'id' => $row['id'],
            'message' => $row['message'],
            'status' => $row['status'],
            'created_at' => $row['created_at']
        ];
    }
}

// Return notifications as JSON
header('Content-Type: application/json');
echo json_encode($notifications);
?>
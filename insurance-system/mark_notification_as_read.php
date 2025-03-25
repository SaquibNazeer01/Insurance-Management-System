<?php
session_start();
include 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $notification_id = $_GET['id'];
    $sql = "UPDATE notifications SET status='read' WHERE id='$notification_id'";
    if ($conn->query($sql)) {
        header("Location: notifications.php");
        exit();
    } else {
        die("Error marking notification as read: " . $conn->error);
    }
} else {
    header("Location: notifications.php");
    exit();
}
?>
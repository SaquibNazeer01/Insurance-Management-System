<?php
session_start();
include '../includes/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = $_SESSION['user_id'];
    $message = $_POST['message'];

    $sql = "INSERT INTO feedback (customer_id, message) VALUES ($customer_id, '$message')";
    if ($conn->query($sql)) {
        echo "<script>alert('Feedback submitted successfully!'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Error submitting feedback: " . $conn->error . "');</script>";
    }
}
?>

<form method="POST" action="feedback.php">
    <textarea name="message" placeholder="Enter your feedback" required></textarea>
    <button type="submit">Submit Feedback</button>
</form>
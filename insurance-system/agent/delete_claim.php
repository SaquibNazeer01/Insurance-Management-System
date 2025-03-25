<?php
include '../includes/db.php';

$id = $_GET['id'];

$sql = "DELETE FROM claims WHERE id=$id";
if ($conn->query($sql)) {
    echo "<script>alert('Claim deleted successfully!'); window.location.href='claims.php';</script>";
} else {
    echo "<script>alert('Error: " . $conn->error . "');</script>";
}
?>
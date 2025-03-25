<?php
include '../includes/db.php';

$id = $_GET['id'];

$sql = "DELETE FROM agents WHERE id=$id";
if ($conn->query($sql)) {
    echo "<script>alert('Agent deleted successfully!'); window.location.href='manage_agents.php';</script>";
} else {
    echo "<script>alert('Error: " . $conn->error . "');</script>";
}
?>
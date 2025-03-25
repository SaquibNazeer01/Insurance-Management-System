<?php
include '../includes/db.php';

$id = $_GET['id'];

$sql = "DELETE FROM policies WHERE id=$id";
if ($conn->query($sql)) {
    echo "<script>alert('Policy deleted successfully!'); window.location.href='policies.php';</script>";
} else {
    echo "<script>alert('Error: " . $conn->error . "');</script>";
}
?>
<?php
include '../includes/db.php';

$id = $_GET['id'];

$sql = "DELETE FROM customers WHERE id=$id";
if ($conn->query($sql)) {
    echo "<script>alert('Customer deleted successfully!'); window.location.href='manage_customers.php';</script>";
} else {
    echo "<script>alert('Error: " . $conn->error . "');</script>";
}
?>
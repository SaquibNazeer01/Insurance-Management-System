<?php
/**
 * Copyright (c) 2025 SwiftInsureX by SKB
 * License: MIT
 */
session_start();
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        // Fetch agent_id if the user is an agent
        if ($user['role'] == 'agent') {
            $user_id = $user['id'];
            $sql = "SELECT id FROM agents WHERE user_id=$user_id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['agent_id'] = $row['id']; // Store agent_id in session
            } else {
                die("Error: Agent not found.");
            }
        }

        switch ($user['role']) {
            case 'admin':
                header('Location: admin/dashboard.php');
                break;
            case 'agent':
                header('Location: agent/dashboard.php');
                break;
            case 'customer':
                header('Location: customer/dashboard.php');
                break;
        }
    } else {
        echo "<script>alert('Invalid credentials!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
        <p><a href="admin_login.php">Admin login</a> </p>
        <p><a href="index.php">Back to Home</a></p>
    </div>
</body>
</html>
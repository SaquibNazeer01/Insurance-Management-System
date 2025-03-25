<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="../assets/js/script.js"></script>
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
        .notification-list {
            display: none;
            position: absolute;
            top: 40px;
            right: 0;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            z-index: 1000;
            padding: 10px;
        }
        .notification-list ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .notification-list ul li {
            margin-bottom: 10px;
        }
        /* Dark mode styles */
        body[data-theme="dark"] {
            background-color: #121212;
            color: #ffffff;
        }
        body[data-theme="dark"] .dashboard-header {
            background-color: #1e1e1e;
            color: #ffffff;
        }
        body[data-theme="dark"] .navbar a {
            color: #ffffff;
        }
        body[data-theme="dark"] .notification-list {
            background-color: #1e1e1e;
            border-color: #333;
        }
    </style>
</head>
<body>
    <header class="dashboard-header">
        <div class="logo">
            <img src="../assets/images/logo.png" alt="Insurance Management System">
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li class="notification-dropdown">
                    <a href="#">
                        <i class="fas fa-bell"></i>
                        <span class="notification-count">0</span>
                    </a>
                    <div class="notification-list">
                        <ul>
                            <!-- Notifications will be dynamically loaded here -->
                        </ul>
                    </div>
                </li>
                <li id="themeToggle"><a href="#"><i class="fas fa-moon"></i> Dark Mode</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
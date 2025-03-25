<?php
session_start();
include '../includes/db.php';

// Redirect if not logged in as customer
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'customer') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main class="chatbot-main">
        <div class="chatbot-container">
            <h1 class="chatbot-title">Chatbot</h1>

            <!-- Chatbot Interface -->
            <div class="chatbot-interface">
                <!-- Chatbot Messages -->
                <div id="chatbot-messages"></div>

                <!-- Chatbot Input -->
                <div class="chatbot-input-container">
                    <input type="text" id="chatbot-input" placeholder="Type your message...">
                    <button id="chatbot-send-btn">Send</button>
                </div>

                <!-- Predefined Questions -->
                <div class="chatbot-questions">
                    <h3>Frequently Asked Questions</h3>
                    <ul id="chatbot-question-list"></ul>
                </div>
            </div>
        </div>
    </main>
    <?php include '../includes/footer.php'; ?>

    <!-- Link to the JavaScript file -->
    <script src="../assets/js/chatbot.js"></script>
</body>
</html>
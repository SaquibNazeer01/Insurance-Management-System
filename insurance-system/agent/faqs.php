<?php
session_start();
include '../includes/db.php';

// Redirect if not logged in as customer
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'customer') {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Handle question submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $question = $_POST['question'];

    $sql = "INSERT INTO faqs (user_id, role, question) 
            VALUES ($user_id, 'customer', '$question')";
    if ($conn->query($sql)) {
        echo "<script>alert('Question submitted successfully!');</script>";
    } else {
        echo "<script>alert('Error submitting question: " . $conn->error . "');</script>";
    }
}

// Fetch FAQs for the customer
$sql = "SELECT * FROM faqs WHERE user_id = $user_id AND role = 'customer' ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <main class="dashboard-main">
        <div class="dashboard-container">
            <h1 class="dashboard-title">FAQs</h1>
            <form method="POST" class="form">
                <div class="form-group">
                    <label for="question">Ask a Question</label>
                    <textarea name="question" id="question" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn">Submit</button>
            </form>

            <div class="faqs-list">
                <h2>Your Questions</h2>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="faq-item">
                        <p><strong>Question:</strong> <?php echo $row['question']; ?></p>
                        <?php if (!empty($row['answer'])): ?>
                            <p><strong>Answer:</strong> <?php echo $row['answer']; ?></p>
                        <?php else: ?>
                            <p><strong>Answer:</strong> Pending</p>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
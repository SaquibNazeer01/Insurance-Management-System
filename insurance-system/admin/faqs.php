<?php
session_start();
include '../includes/db.php';

// Redirect if not logged in as admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

// Handle answer submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $faq_id = $_POST['faq_id'];
    $answer = $_POST['answer'];

    $sql = "UPDATE faqs SET answer = '$answer', answered_at = NOW() WHERE id = $faq_id";
    if ($conn->query($sql)) {
        echo "<script>alert('Answer submitted successfully!');</script>";
    } else {
        echo "<script>alert('Error submitting answer: " . $conn->error . "');</script>";
    }
}

// Fetch all FAQs
$sql = "SELECT faqs.*, 
               CASE 
                   WHEN faqs.role = 'agent' THEN (SELECT name FROM agents WHERE agents.user_id = faqs.user_id)
                   WHEN faqs.role = 'customer' THEN (SELECT name FROM customers WHERE customers.user_id = faqs.user_id)
               END AS user_name
        FROM faqs 
        ORDER BY created_at DESC";
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
            <div class="faqs-list">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="faq-item">
                        <p><strong>User:</strong> <?php echo $row['user_name']; ?></p>
                        <p><strong>Question:</strong> <?php echo $row['question']; ?></p>
                        <?php if (!empty($row['answer'])): ?>
                            <p><strong>Answer:</strong> <?php echo $row['answer']; ?></p>
                        <?php else: ?>
                            <form method="POST" class="form">
                                <input type="hidden" name="faq_id" value="<?php echo $row['id']; ?>">
                                <div class="form-group">
                                    <label for="answer">Your Answer</label>
                                    <textarea name="answer" id="answer" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn">Submit Answer</button>
                            </form>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </main>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'], $_POST['transaction_id'])) {
    $orderId = $_POST['order_id'];
    $transactionId = $_POST['transaction_id'];

    // Update order status
    $stmt = $conn->prepare("UPDATE orders SET status='paid' WHERE id=?");
    $stmt->bind_param("i", $orderId);
    $stmt->execute();

    // Save payment info
    $stmt = $conn->prepare("INSERT INTO payments (order_id, payment_method, transaction_id, status, paid_amount) VALUES (?, 'UPI', ?, 'success', (SELECT total_amount FROM orders WHERE id=?))");
    $stmt->bind_param("isi", $orderId, $transactionId, $orderId);
    $stmt->execute();

    unset($_SESSION['cart']);
} else {
    echo "<p>Invalid access.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Payment Success</title>
    <style>
        body {font-family: 'Poppins', sans-serif; background: #f0fdf4; text-align: center;}
        .container {max-width: 500px; margin: auto; background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 0 20px rgba(0,0,0,0.05);}
        h2 {color: #16a34a; font-size: 24px;}
        .details {margin: 20px 0; font-size: 16px;}
        .btn {padding: 10px 20px; background: #2563eb; color: white; text-decoration: none; border-radius: 6px; margin: 10px;}
    </style>
</head>
<body>
     <?php include 'header.php'; ?>
<div class="container">
    <h2>✅ Payment Successful!</h2>
    <div class="details">
        <p><strong>Order ID:</strong> <?= htmlspecialchars($orderId) ?></p>
        <p><strong>Transaction ID:</strong> <?= htmlspecialchars($transactionId) ?></p>
        <p>📬 A confirmation will be sent to your email or phone.</p>
    </div>
    <!-- <a class="btn" href="dashboard.php">Go to Dashboard</a> -->
    <a class="btn" href="view_order.php?order_id=<?= $orderId ?>">View Order</a>
</div>
</body>
</html>

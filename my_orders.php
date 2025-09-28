<?php
session_start();
include('db.php');  // assumes $conn is set

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "Please log in to view your orders.";
    exit;
}

$userId = $_SESSION['user_id'];

// Fetch all orders for the logged-in user
$stmt = $conn->prepare("SELECT id, total_amount, status, created_at FROM orders WHERE user_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $userId);
$stmt->execute();
$res = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        h2 { margin-top: 30px; }
    </style>
</head>
<body>
    <h2>My Orders</h2>

    <?php if ($res->num_rows === 0): ?>
        <p>You have not placed any orders yet.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Placed On</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($order = $res->fetch_assoc()): ?>
                    <tr>
                        <td>#<?= htmlspecialchars($order['id']) ?></td>
                        <td>₹<?= number_format($order['total_amount'], 2) ?></td>
                        <td><?= htmlspecialchars(ucfirst($order['status'])) ?></td>
                        <td><?= htmlspecialchars(date('d M Y, h:i A', strtotime($order['created_at']))) ?></td>
                        <td><a href="view_order.php?id=<?= $order['id'] ?>">View</a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>

 <?php
session_start();
include('db.php');  // Make sure this file sets up $conn (MySQLi connection)

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: userLogin.php');  // redirect to your login page
    exit;
}

$userId = $_SESSION['user_id'];

// Validate Order ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "⚠ Order ID is missing or invalid.";
    exit;
}

$orderId = intval($_GET['id']);

try {
    // Fetch order details (only if belongs to logged-in user)
    $stmt = $conn->prepare("SELECT * FROM orders WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $orderId, $userId);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 0) {
        throw new Exception("⚠ Order not found.");
    }

    $order = $res->fetch_assoc();
    
    // Fetch order items
    $stmtItems = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");
    $stmtItems->bind_param("i", $orderId);
    $stmtItems->execute();
    $resItems = $stmtItems->get_result();
} catch (Exception $e) {
    echo $e->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Order #<?= htmlspecialchars($orderId) ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-top: 15px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        th { background: #f4f4f4; }
        h2 { margin-bottom: 5px; }
        a { text-decoration: none; color: blue; }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <h2>Order #<?= htmlspecialchars($orderId) ?></h2>
    <p><strong>Status:</strong> <?= htmlspecialchars($order['status']) ?></p>
    <p><strong>Name:</strong> <?= htmlspecialchars($order['customer_name']) ?></p>
    <p><strong>Phone:</strong> <?= htmlspecialchars($order['phone']) ?></p>
    <p><strong>Address:</strong> <?= nl2br(htmlspecialchars($order['address'])) ?></p>
    <p><strong>Total Amount:</strong> ₹<?= number_format($order['total_amount'], 2) ?></p>

    <h3>Items</h3>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Unit Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($resItems->num_rows > 0): ?>
            <?php while ($item = $resItems->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($item['product_name']) ?></td>
                    <td><?= htmlspecialchars($item['qty']) ?></td>
                    <td>₹<?= number_format($item['unit_price'], 2) ?></td>
                    <td>₹<?= number_format($item['subtotal'], 2) ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No items found for this order.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <br>
    <a href="my_orders.php">← Back to My Orders</a>
</body>
</html>

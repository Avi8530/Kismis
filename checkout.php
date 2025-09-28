
  <?php 
     session_start();
include('db.php');

// Check if user is logged in
$loggedIn = isset($_SESSION['user_id']);
$userData = [
    'name' => '',
    'phone' => '',
    'address' => ''
];

if ($loggedIn) {
    $userId = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT name, phone, address FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
    }
}

// If cart is empty
if (empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty.</p>";
    exit;
}

// Calculate the total amount for the cart
$totalAmount = 0;
foreach ($_SESSION['cart'] as $item) {
    $totalAmount += $item['price'] * $item['qty'];
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <style>
        body {font-family:'Arial', sans-serif; background:#f9fafb; }
        .container {max-width:600px; margin:auto; background:#fff; padding:20px; border-radius:8px; box-shadow:0 0 10px rgba(0,0,0,0.1);}
        h1 {text-align:center; margin-bottom:20px;} 
        .form-group {margin-bottom:15px;}
        label {font-weight:600;}
        input, textarea {width:100%; padding:8px; border:1px solid #ccc; border-radius:4px;}
        table {width:100%; margin-top:15px; border-collapse:collapse;}
        th, td {padding:8px; text-align:left; border-bottom:1px solid #ddd;}
        .total {font-weight:bold; text-align:right;}
         .place-btn:hover {background:#45a049;}
         .place-btn {
    width: 15%; /* width of the button */
    text-align: center; /* text alignment inside the button */
    padding: 10px; /* padding around the button */
    background: #4CAF50; /* button background color */
    color: white; /* text color */
    border: none; /* no border */
    font-size: 16px; /* text size */
    cursor: pointer; /* pointer on hover */
    border-radius: 5px; /* rounded corners */
    display: block; /* makes the button a block-level element */
    margin: 0 auto; /* horizontally centers the button */
}


    </style>
</head>
<body>
   <?php include 'header.php'; ?>
<div class="container">
    <h1>Checkout</h1>
    <form action="payment.php" method="POST">
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" value="<?= htmlspecialchars($userData['name']) ?>" required>
        </div>
        <div class="form-group">
            <label>Mobile Number</label>
            <input type="tel" name="phone" pattern="[0-9]{10}" value="<?= htmlspecialchars($userData['phone']) ?>" required>
        </div>
        <div class="form-group">
            <label>Address</label>
            <textarea name="address" rows="4" required><?= htmlspecialchars($userData['address']) ?></textarea>
        </div>

        <h3>Order Summary</h3>
        <table>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
            <?php 
            $total = 0;
            foreach ($_SESSION['cart'] as $item): 
                $subtotal = $item['price'] * $item['qty']; 
                $total += $subtotal;
            ?>
            <tr>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td>₹<?= $item['price'] ?></td>
                <td><?= $item['qty'] ?></td>
                <td>₹<?= $subtotal ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <p class="total">Total: ₹<?= $total ?></p>
        <input type="hidden" name="total_amount" value="<?= $total ?>">
        <button type="submit" class="place-btn">Make Payment</button>
    </form>
</div>
</body>
</html>

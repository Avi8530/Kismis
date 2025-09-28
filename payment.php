<?php
session_start();
include('db.php');

// ✅ Validate form submission from checkout
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['phone'], $_POST['address'], $_POST['total_amount'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $totalAmount = $_POST['total_amount'];

    if (empty($_SESSION['cart'])) {
        echo "<p>Your cart is empty. Please add items before payment.</p>";
        exit;
    }

    // 👤 Get user_id if logged in
    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;

    // ✅ 1. Insert into orders table
    $stmt = $conn->prepare("INSERT INTO orders (user_id, customer_name, phone, address, total_amount, status) VALUES (?, ?, ?, ?, ?, 'pending')");
    $stmt->bind_param("isssd", $userId, $name, $phone, $address, $totalAmount);
    $stmt->execute();
    $orderId = $stmt->insert_id;

    // ✅ 2. Insert order items
    $stmtItem = $conn->prepare("INSERT INTO order_items (order_id, product_id, product_name, qty, unit_price, subtotal) VALUES (?, ?, ?, ?, ?, ?)");
    foreach ($_SESSION['cart'] as $item) {
        $subtotal = $item['price'] * $item['qty'];
        $stmtItem->bind_param("iisiid", $orderId, $item['id'], $item['name'], $item['qty'], $item['price'], $subtotal);
        $stmtItem->execute();
    }

    // ✅ 3. Generate UPI Payment Link
    $merchantUpiId = "jadhavas2001@oksbi"; // 🔁 Replace with real UPI
    $paymentNote = urlencode("Payment for Order #$orderId");
    $upiLink = "upi://pay?pa=$merchantUpiId&pn=MerchantName&tn=$paymentNote&am=" . number_format($totalAmount, 2, '.', '') . "&cu=INR";

    // ✅ 4. Store order_id in session for success page
    $_SESSION['current_order_id'] = $orderId;

} else {
    echo "<p>Invalid request.</p>";
    exit;
}
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Make Payment</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f9fafb;
      margin: 0;
      
    }
    .container {
      max-width: 500px;
      margin: auto;
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0,0,0,0.05);
      text-align: center;
    }
    h2 {
      margin-bottom: 20px;
    }
    .amount {
      font-size: 22px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .btn-pay {
      display: block;
      width: 100%;
      margin: 10px 0;
      padding: 14px;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      color: white;
      text-decoration: none;
      text-align: center;
      transition: opacity 0.3s ease;
    }
    .btn-googlepay {background: #4285f4;}
    .btn-phonepe {background: #4caf50;}
    .btn-pay:hover {opacity: 0.9;}
  


    .qr-section {
    text-align: center; /* Center the content inside the section */
    padding: 20px; /* Adds some space around the content */
 
    border-radius: 8px; /* Rounded corners */
  
    max-width: 300px; /* Limits the section's width */
    margin: 0 auto; /* Centers the whole section on the page */
}

.qr-title {
    font-size: 18px; /* Size of the title */
    margin-bottom: 15px; /* Space below the title */
    color: #333; /* Dark color for the title */
    font-weight: 600; /* Bold title */
}

.QRimage {
    width: 100%; /* Make the image take up the full width of its container */
    max-width: 220px; /* Prevents the image from getting larger than its original size */
    height: auto; /* Keeps the aspect ratio of the image */
    border-radius: 10px; /* Optional: Rounded corners for the image */
     margin-top: 10px; /* Adds space above the image */
}

  
    .continue-btn {
      margin-top: 30px;
      padding: 12px 24px;
      background: #10b981;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    
    .continue-btn:hover {
      background: #059669;
    }
    /* ✅ Responsive */
    @media (max-width: 600px) {
      .container {
        padding: 20px;
      }
      .amount {
        font-size: 20px;
      }
      .btn-pay {
        font-size: 15px;
        padding: 12px;
      }
       
    }
  </style>
</head>
<body>
  <?php include 'header.php'; ?>
  <div class="container">
    <h2>Pay Now</h2>
    <p class="amount">Total Amount: ₹<?= number_format($totalAmount, 2) ?></p>

    <a href="<?= htmlspecialchars($upiLink) ?>" class="btn-pay btn-googlepay" target="_blank">Pay with Google Pay</a>
    <a href="<?= htmlspecialchars($upiLink) ?>" class="btn-pay btn-phonepe" target="_blank">Pay with PhonePe</a>

    <div class="qr-section">
      <div class="qr-title">Or Scan QR Code:</div>
      
      <img class="QRimage" src="https://api.qrserver.com/v1/create-qr-code/?data=<?= urlencode($upiLink) ?>&size=220x220" alt="UPI QR">
    </div>

    <form action="payment_success.php" method="POST">
      <input type="hidden" name="order_id" value="<?= $orderId ?>">
      <input type="hidden" name="transaction_id" value="TXN<?= time() ?>">
      <button class="continue-btn" type="submit">I Have Paid</button>
    </form>
  </div>
</body>
</html>

  
    <?php
    session_start();
    include('db.php'); // Make sure db.php connects $conn to your MySQL database

    // Handle POST request (add, update, delete)
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
        $product_id = (int)$_POST['product_id'];
        $action = $_POST['action'] ?? '';

        // 🗑️ Delete item
        if ($action === 'delete') {
            if (isset($_SESSION['cart'][$product_id])) {
                unset($_SESSION['cart'][$product_id]);
            }
        }

        // 🔄 Update quantity
        elseif ($action === 'update' && isset($_POST['qty'])) {
            $qty = max(1, (int)$_POST['qty']);
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['qty'] = $qty;
            }
        }

        // ➕ Add to cart
        else {
            $stmt = $conn->prepare("SELECT * FROM products WHERE pid = ?");
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
            $res = $stmt->get_result();
            $product = $res->fetch_assoc();

            if ($product) {
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }

                if (!isset($_SESSION['cart'][$product_id])) {
                    $_SESSION['cart'][$product_id] = [
                        'id'    => $product_id,
                        'name'  => $product['pname'],
                        'price' => $product['price'],
                        'qty'   => 1
                    ];
                } else {
                    $_SESSION['cart'][$product_id]['qty'] += 1;
                }
            }
        }

        // 🚀 Redirect to avoid form resubmission
        header("Location: cart.php");
        exit;
    }
    ?>

      

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Your Cart</title>

    <!-- ✅ Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f5f5;
            margin: 0;
            
        }

        .cart {
            max-width: 1000px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 26px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #f1f5f9;
        }

        .qty-form {
            display: inline-block;
        }

        .qty-input {
            width: 60px;
            padding: 5px;
        }

        .total {
            text-align: right;
            font-weight: 600;
            margin-top: 20px;
            font-size: 18px;
        }

        .btn-checkout {
            background: #16a34a;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 12px 20px;
            cursor: pointer;
            float: right;
            margin-top: 20px;
            font-size: 16px;
        }

        .btn-checkout:hover {
            background: #15803d;
        }

        .empty {
            text-align: center;
            padding: 50px 0;
            font-size: 18px;
        }

        .action-btn {
            background: none;
            border: none;
            cursor: pointer;
            color: #dc2626;
            font-size: 18px;
        }

        .action-btn:hover {
            color: #b91c1c;
        }

        /* ✅ Responsive Design */
        @media (max-width: 768px) {

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            thead tr {
                display: none;
            }

            tr {
                margin-bottom: 15px;
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 10px;
                background: #fafafa;
            }

            td {
                padding: 10px;
                text-align: right;
                border: none;
                display: flex;
                justify-content: space-between;
                font-size: 14px;
            }

            td::before {
                content: attr(data-label);
                font-weight: 600;
                text-align: left;
            }

            .total {
                text-align: center;
                font-size: 16px;
            }

            .btn-checkout {
                width: 100%;
                float: none;
                margin-top: 15px;
            }
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="cart">
        <h1>Your Cart</h1>

        <?php if (!empty($_SESSION['cart'])): ?>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price (₹)</th>
                        <th>Quantity</th>
                        <th>Subtotal (₹)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['cart'] as $item):
                        $subtotal = $item['price'] * $item['qty'];
                        $total += $subtotal;
                    ?>
                        <tr>
                            <td data-label="Product"><?= htmlspecialchars($item['name']) ?></td>
                            <td data-label="Price">₹<?= number_format($item['price']) ?></td>
                            <td data-label="Quantity">
                                <form method="POST" class="qty-form">
                                    <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                    <input type="hidden" name="action" value="update">
                                    <input type="number" name="qty" value="<?= $item['qty'] ?>" min="1"
                                        class="qty-input" onchange="this.form.submit()">
                                </form>
                            </td>
                            <td data-label="Subtotal">₹<?= number_format($subtotal) ?></td>
                            <td data-label="Action">
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="product_id" value="<?= $item['id'] ?>">
                                    <input type="hidden" name="action" value="delete">
                                    <button type="submit" class="action-btn" title="Remove">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <p class="total">Total: ₹<?= number_format($total) ?></p>
            <a href="checkout.php"><button class="btn-checkout">Proceed to Checkout</button></a>

        <?php else: ?>
            <p class="empty">🛒 Your cart is empty</p>
        <?php endif; ?>
    </div>
</body>

</html>

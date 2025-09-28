<?php
session_start();
include('nav.php');
include_once "../db.php";

$total_price = 0; // Initialize total price variable

// Remove item from cart
if (isset($_POST['remove'])) {
    $remove_id = $_POST['product_id'];
    unset($_SESSION['cart'][$remove_id]); // Remove item from the cart
}

// Cancel the order (clear the entire cart)
if (isset($_POST['cancel'])) {
    unset($_SESSION['cart']); // Clear the entire cart
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['remove']) && !isset($_POST['cancel'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $_SESSION['cart'][$product_id] = $quantity;
}

?>

<div class="container">
    <h1>Your Order</h1>
    <ul>
        <?php
        foreach ($_SESSION['cart'] as $id => $quantity):
            // Fetch product details (name, price) from the database
            $query = "SELECT pname, price FROM products WHERE pid = $id"; // Use 'pid' here for consistency
            $result = mysqli_query($conn, $query); // Use $conn instead of $sql for the database connection
            if ($result) {
                $product = mysqli_fetch_assoc($result);

                // Calculate total price for the product
                $total_item_price = $product['price'] * $quantity;
                $total_price += $total_item_price; // Add the item price to the total price
            }
        ?>
            <li>
                <h3><?php echo $product['pname']; ?></h3>
                <p>Price: ₹<?php echo number_format($product['price'], 2); ?></p>
                <p>Total Quantity: <?php echo $quantity; ?></p>
                <p>Total: ₹<?php echo number_format($total_item_price, 2); ?></p>

                <!-- Add Remove and Cancel buttons -->
                <form method="POST" style="display: inline;">
                    <input type="hidden" name="product_id" value="<?php echo $id; ?>" />
                    <button type="submit" name="remove" class="remove-btn">
                        <i class="fas fa-trash-alt"></i> Remove
                    </button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

    <div class="total">
        <h3>Total Price: ₹<?php echo number_format($total_price, 2); ?></h3>
    </div>

    <!-- Cancel Order button -->
    <form method="POST">
        <button type="submit" name="cancel" class="cancel-btn">Cancel Order</button>
    </form>

    <a class="checkout" href="checkout.php">Proceed to Checkout</a>
</div>



    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 2.5rem;
            margin-bottom: 30px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }
        .total {
        margin-top: 20px;
        padding: 15px;
        background-color: #f1f1f1;
        border-radius: 8px;
        text-align: end;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .total h3 {
        margin: 0;
        color: #333;
    }


        ul li {

            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        ul li span {
            font-size: 1.2rem;
            color: #555;
        }

        ul li .quantity {
            font-weight: bold;
            color: #007bff;
        }

        .checkout {
            display: inline-block;
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 15px 30px;
            border-radius: 4px;
            font-size: 1.2rem;
            text-decoration: none;
            margin-top: 30px;
            width: 100% auto;
        }

        l .checkout:hover {
            background-color: #0056b3;
            transition: background-color 0.3s ease;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 2rem;
            }

            ul li {
                flex-direction: column;
                align-items: flex-start;
            }

            ul li span {
                margin-bottom: 10px;
            }

            .checkout {
                width: 100%;
                padding: 12px 20px;
            }
        }

        .remove-btn {
    background-color: #ff4d4d;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1rem;
    display: inline-flex;
    align-items: center;
    gap: 5px;
}

.remove-btn i {
    font-size: 1.2rem;
}

.remove-btn:hover {
    background-color: #e60000;
    transition: background-color 0.3s ease;
}

.cancel-btn {
    background-color: #f8b400;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1.2rem;
    display: inline-block;
    margin-top: 20px;
}

.cancel-btn:hover {
    background-color: #f5a300;
    transition: background-color 0.3s ease;
}

.checkout {
    display: inline-block;
    text-align: center;
    background-color: #007bff;
    color: white;
    padding: 15px 30px;
    border-radius: 4px;
    font-size: 1.2rem;
    text-decoration: none;
    margin-top: 30px;
    width: 100% auto;
}

.checkout:hover {
    background-color: #0056b3;
    transition: background-color 0.3s ease;
}

    </style>
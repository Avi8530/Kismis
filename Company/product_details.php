<?php
session_start();
include('nav.php');
include_once "../db.php"; // Ensure the database connection is included

    // Check if 'id' is set in the URL and sanitize it
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $pid = intval($_GET['id']);

        // Use prepared statements to fetch product details
        $stmt = $conn->prepare("SELECT * FROM products WHERE pid = ?");
        $stmt->bind_param("i", $pid);  // 'i' means integer
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if product exists
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
        } else {
            echo "<p>Product not found.</p>";
            exit();
        }
    } else {
        echo "<p>Invalid Product ID.</p>";
        exit();
    }
?>

<div class="container">
    <div class="product-detail">
        <div class="x1">
            <div class="product-info">
                <h1><?php echo htmlspecialchars($product['pname']); ?></h1>
                <p><strong>Description:</strong> <?php echo htmlspecialchars($product['description']); ?></p>
                <p><strong>Price:</strong> ₹<?php echo htmlspecialchars($product['price']); ?></p>

                <form method="post" action="cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $product['pid']; ?>">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" value="10" min="10"> <!-- Minimum 10, no max -->
                    <button type="submit">Add to Order</button>
                </form>


            </div>

            <div class="product-image">
                <img src="<?php echo !empty($product['image']) ? 'productPic/' . htmlspecialchars($product['image']) : 'productPic/default-placeholder.jpg'; ?>"
                    alt="<?php echo htmlspecialchars($product['pname']); ?>" class="product-image-large">
            </div>

        </div>
    </div>
</div>

<?php
$conn->close();
?>




<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f4f4f9;
    }

    .container {
        max-width: 1100px;
        margin: 40px auto;
        padding: 40px;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .x1 {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 40px;
    }

    .product-info {
        flex: 1;
        max-width: 500px;
    }

    .product-detail h1 {
        font-size: 2.8rem;
        margin-bottom: 20px;
        color: #34495e;
    }

    .product-image {
        flex: 1;
        max-width: 500px;
    }

    .product-image-large {
        width: 100%;
        height: auto;
        border: 1px solid #ddd;
        border-radius: 8px;
        object-fit: cover;
    }

    p {
        font-size: 1.1rem;
        margin: 15px 0;
    }

    form {
        margin-top: 30px;
    }

    label {
        font-weight: 600;
        display: block;
        margin-bottom: 12px;
    }

    input[type="number"] {
        width: 80px;
        padding: 10px;
        font-size: 1rem;
        text-align: center;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 25px;
    }

    button {
        background-color: #3498db;
        color: #fff;
        border: none;
        padding: 14px 28px;
        font-size: 1rem;
        cursor: pointer;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #2980b9;
    }

    @media (max-width: 900px) {
        .x1 {
            flex-direction: column;
            align-items: center;
            gap: 30px;
        }

        .product-info,
        .product-image {
            max-width: 100%;
            text-align: center;
        }

        .product-detail h1 {
            font-size: 2.2rem;
        }

        p {
            font-size: 1rem;
        }

        button {
            padding: 12px 24px;
        }
    }
</style>
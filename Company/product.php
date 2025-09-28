  <?php
session_start();
include_once "../db.php";

// Redirect if not logged in
if (!isset($_SESSION['COMPANY_LOGGED_IN'])) {
    header('Location: login.php');
    exit();
}

include('nav.php');

$cid = $_SESSION['cid'] ?? 0;
$sql = "SELECT * FROM products WHERE cid = '$cid'";
$result = $conn->query($sql);
?>

<div class="product-list">
    <?php if ($result->num_rows > 0): ?>
        <div class="products">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="product-card">
                    <div class="image-viewer">
                        <!-- Main Large Image -->
                        <img id="mainImage_<?php echo $row['pid']; ?>" class="main-image" src="productPic/<?php echo htmlspecialchars($row['image']); ?>" alt="Main Product Image">

                        <!-- Thumbnail Selector -->
                        <div class="thumbnail-row">
                            <img onclick="changeMainImage('<?php echo $row['pid']; ?>', 'productPic/<?php echo htmlspecialchars($row['image']); ?>')" src="productPic/<?php echo htmlspecialchars($row['image']); ?>" alt="thumb">
                            <img onclick="changeMainImage('<?php echo $row['pid']; ?>', 'productPic/<?php echo htmlspecialchars($row['image2']); ?>')" src="productPic/<?php echo htmlspecialchars($row['image2']); ?>" alt="thumb">
                            <img onclick="changeMainImage('<?php echo $row['pid']; ?>', 'productPic/<?php echo htmlspecialchars($row['image3']); ?>')" src="productPic/<?php echo htmlspecialchars($row['image3']); ?>" alt="thumb">
                            <img onclick="changeMainImage('<?php echo $row['pid']; ?>', 'productPic/<?php echo htmlspecialchars($row['image4']); ?>')" src="productPic/<?php echo htmlspecialchars($row['image4']); ?>" alt="thumb">
                        </div>
                    </div>

                    <div class="card-body">
                        <h2><?php echo htmlspecialchars($row['pname']); ?></h2>
                        <p><strong>Description:</strong> <?php echo htmlspecialchars($row['description']); ?></p>
                        <p><strong>Price:</strong> ₹<?php echo htmlspecialchars($row['price']); ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p style="text-align:center;">You have no products listed. <a href="add_product.php">Add a product</a>.</p>
    <?php endif; ?>
</div>

<?php $conn->close(); ?>

<style>
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f2f4f8;
    margin: 0;
    padding: 0;
}

.product-list {
    max-width: 1200px;
    /* smargin: 60px auto; */
    padding: 20px;
}

.products {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.product-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 14px rgba(0,0,0,0.1);
    transition: transform 0.4s ease, box-shadow 0.3s ease;
    width: 300px;
}

.product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 24px rgba(0, 0, 0, 0.2);
}

.image-viewer {
    padding: 15px;
    text-align: center;
}

.main-image {
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
}

.thumbnail-row {
    display: flex;
    justify-content: center;
    gap: 8px;
}

.thumbnail-row img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 8px;
    cursor: pointer;
    border: 2px solid transparent;
    transition: border 0.3s;
}

.thumbnail-row img:hover {
    border: 2px solid #007BFF;
}

.card-body {
    padding: 15px;
}

.card-body h2 {
    font-size: 20px;
    margin-bottom: 10px;
    color: #1a1a1a;
}

.card-body p {
    font-size: 14px;
    color: #555;
    margin: 5px 0;
}

@media (max-width: 768px) {
    .product-card {
        width: 100%;
    }
}
</style>

<script>
  function changeMainImage(pid, src) {
    const img = document.getElementById("mainImage_" + pid);
    img.src = src;
  }
</script>

 <?php
    // Database connection
    include('db.php');

    // Check if product ID is provided
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        echo "<p style='text-align:center; color:red;'>Invalid product ID.</p>";
        exit;
    }

    $product_id = (int) $_GET['id'];

    // Fetch the product details
    $query = "SELECT * FROM products WHERE pid = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "<p style='text-align:center; color:red;'>Product not found.</p>";
        exit;
    }

    $product = $result->fetch_assoc();
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?= htmlspecialchars($product['pname']) ?> - Product Details</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
     <style>
         body {
             font-family: 'Poppins', sans-serif;
             background: #f2f4f8;
             margin: 0;
        
             background: linear-gradient(270deg, #00c6ff, #7b2ff7, #ff6ec4, #2af598, #00c6ff);

             background-size: 1000% 1000%;
             animation: animatedBackground 20s ease infinite;
         }

         @keyframes animatedBackground {
             0% {
                 background-position: 0% 50%;
             }

             50% {
                 background-position: 100% 50%;
             }

             100% {
                 background-position: 0% 50%;
             }
         }

         /* Container: Images left, Details right */
         .product-detail-container {
             max-width: 1000px;
             margin: 0 auto;
             background: white;
             border-radius: 15px;
             padding: 20px;
             box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
             display: flex;
             gap: 30px;
             align-items: flex-start;
             flex-wrap: wrap;

             animation: fadeIn 1.2s ease-out;
         }


         @keyframes fadeIn {
             from {
                 opacity: 0;
                 transform: translateY(20px);
             }

             to {
                 opacity: 1;
                 transform: translateY(0);
             }
         }

         /* Left: Images */
         .product-images {
             flex: 1 1 45%;
         }

         .main-image {
             width: 100%;
             height: 400px;
             object-fit: cover;
             border-radius: 12px;
             margin-bottom: 15px;
             box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
         }

         .thumbnail-row {
             display: flex;
             gap: 10px;
             flex-wrap: wrap;
         }

         .thumbnail-row img {
             width: 70px;
             height: 70px;
             object-fit: cover;
             border-radius: 8px;
             cursor: pointer;
             border: 2px solid transparent;
             transition: border 0.3s;
         }

         .thumbnail-row img:hover {
             border: 2px solid #007BFF;
         }

         /* Right: Details */
         .product-details {
             flex: 1 1 50%;
             display: flex;
             flex-direction: column;
             justify-content: center;
         }

         .product-details h1 {
             font-size: 28px;
             margin-bottom: 15px;
         }

         .product-details p {
             font-size: 16px;
             margin: 8px 0;
             color: #555;
         }

         .add-cart-btn {
             background-color: #16a34a;
             color: white;
             padding: 12px 18px;
             border: none;
             border-radius: 6px;
             cursor: pointer;
             font-weight: bold;
             margin-top: 20px;
             max-width: 200px;
         }

         .add-cart-btn:hover {
             background-color: #15803d;
         }

         /* Mobile responsive */
         @media (max-width: 768px) {
             .product-detail-container {
                 flex-direction: column;
                 align-items: center;
                 text-align: center;
             }

             .product-details {
                 align-items: center;
             }

             .add-cart-btn {
                 width: 100%;
             }
         }
     </style>
 </head>

 <body>
     <?php include 'header.php'; ?>
     <div class="product-detail-container">
         <!-- Images Left -->
         <div class="product-images">
             <?php
                $image1 = !empty($product['image']) ? $product['image'] : 'https://via.placeholder.com/500';
                ?>
             <img id="mainImage" src="Company/productPic/<?= htmlspecialchars($image1) ?>" alt="Main Product Image" class="main-image">

             <div class="thumbnail-row">
                 <?php if (!empty($product['image'])): ?>
                     <img onclick="changeImage('Company/productPic/<?= htmlspecialchars($product['image']) ?>')"
                         src="Company/productPic/<?= htmlspecialchars($product['image']) ?>" alt="thumb">
                 <?php endif; ?>
                 <?php if (!empty($product['image2'])): ?>
                     <img onclick="changeImage('Company/productPic/<?= htmlspecialchars($product['image2']) ?>')"
                         src="Company/productPic/<?= htmlspecialchars($product['image2']) ?>" alt="thumb">
                 <?php endif; ?>
                 <?php if (!empty($product['image3'])): ?>
                     <img onclick="changeImage('Company/productPic/<?= htmlspecialchars($product['image3']) ?>')"
                         src="Company/productPic/<?= htmlspecialchars($product['image3']) ?>" alt="thumb">
                 <?php endif; ?>
                 <?php if (!empty($product['image4'])): ?>
                     <img onclick="changeImage('Company/productPic/<?= htmlspecialchars($product['image4']) ?>')"
                         src="Company/productPic/<?= htmlspecialchars($product['image4']) ?>" alt="thumb">
                 <?php endif; ?>
             </div>
         </div>

         <!-- Details Right -->
         <div class="product-details">
             <h1><?= htmlspecialchars($product['pname']) ?></h1>
             <p><strong>Price:</strong> ₹<?= htmlspecialchars($product['price']) ?></p>
             <p><strong>Description:</strong> <?= htmlspecialchars($product['description']) ?></p>

             <form action="cart.php" method="POST">
                 <input type="hidden" name="product_id" value="<?= $product['pid'] ?>">
                 <button type="submit" class="add-cart-btn">
                     <i class="fas fa-shopping-cart"></i> Add to Cart
                 </button>
             </form>
         </div>
     </div>


     <script>
         function changeImage(src) {
             document.getElementById('mainImage').src = src;
         }
     </script>

 </body>

 </html>
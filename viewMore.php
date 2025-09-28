 
<?php
include('db.php');

$search_term = '';
$search_results = [];

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_term = htmlspecialchars($_GET['search']);

    // Search companies by name or website
    $search_query = "
    SELECT * FROM products 
    WHERE pname LIKE ? OR description LIKE ? OR price LIKE ?";

     $stmt = $conn->prepare($search_query);
    $like_term = "%$search_term%";
    $stmt->bind_param("sss", $like_term, $like_term, $like_term);
    $stmt->execute();
    $search_results = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
} else {
    // Default: Fetch all companies if no search is performed
    $query = "SELECT * FROM products";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $search_results = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="img/favicon.png">
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

   

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body>
     <?php include 'header.php'; ?>
    <div class="search-box">
        <form method="GET">
            <div class="search-container">
                <input type="text" name="search" placeholder="Search for products..." value="<?= htmlspecialchars($search_term ?? '') ?>">
                <button type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
    </div>

    <main class="container mx-auto py-10 bg-blue-50">



    
 <div class="Top-company-grid">
    <?php
    // Display product cards
    if (!empty($search_results)) {
        foreach ($search_results as $product) {
            $image1 = !empty($product['image']) ? $product['image'] : 'https://via.placeholder.com/150';
            $product_id  = $product['pid'];
    ?>
        <div class="Top-company-card Top-fade-in">
            <a href="view_company_profile.php?id=<?= $product_id ?>" class="block">
                <!-- Product Image -->
                <img src="Company/productPic/<?= htmlspecialchars($image1) ?>" alt="Product Image" />

                <!-- Product Details -->
                <div class="text-center mt-2">
                    <h2 class="text-lg font-semibold"><?= htmlspecialchars($product['pname']) ?></h2>
                    <p class="text-gray-700"><strong>Price:</strong> <?= htmlspecialchars($product['price']) ?></p>
                </div>
            </a>

            <!-- Add to Cart Button -->
            <div class="mt-3 text-center">
                <form action="cart.php" method="POST">
                    <input type="hidden" name="product_id" value="<?= $product_id ?>" />
                    <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-700">
                        Add to Cart
                    </button>
                </form>
            </div>
        </div>
    <?php
        }
    } else {
        echo "<p class='text-center text-gray-500'>No products found.</p>";
    }
    ?>
</div>









        <!-- Display Products for Selected Company -->
        <?php
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $company_id = (int)$_GET['id'];

            // Fetch products for the selected company
            $product_query = "
            SELECT p.*, c.cIndustry 
            FROM products p
            INNER JOIN company c ON c.id = p.cid
            WHERE p.cid = ?";  // Fetch products only for this company

            $stmt = $conn->prepare($product_query);
            $stmt->bind_param("i", $company_id);
            $stmt->execute();
            $product_result = $stmt->get_result();

            if ($product_result && mysqli_num_rows($product_result) > 0) {
                echo "<div class='py-10'>";
                echo "<h2 class='text-2xl font-semibold text-center py-4'>Products</h2>";
                echo "<div class='grid grid-cols-1 md:grid-cols-3 gap-6'>";

                while ($product = mysqli_fetch_assoc($product_result)) {
            ?>
                        <div>
                            <img src="Product/images/<?= htmlspecialchars($product['image']) ?>" alt="Product Image" class="w-full h-40 object-cover rounded">
                            <div class="mt-4 text-center">
                                <h3 class="text-lg font-bold"> <?= htmlspecialchars($product['pname']) ?> </h3>
                                <p class="mt-2 text-sm"> <?= htmlspecialchars($product['cName']) ?> </p>
                                <p class="text-blue-600 font-semibold mt-2">$<?= number_format($product['price'], 2) ?></p>
                            </div>
                        </div>
        <?php
                }
                echo "</div></div>";
            } else {
                echo "<p class='text-center text-gray-500 py-10'>No products found for this company.</p>";
            }
        }
        ?>
    </main>
</body>

</html>


<style>
    /* Responsive CSS for All Views */

/* General Responsive Styles */
body {
    font-family: 'Roboto', sans-serif;
    background-color: #f4f4f9;
    margin: 0;
    padding: 0;
    color: #333;
}

.search-box {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 30vh;
    background: url('img/viewMore/b1.webp') no-repeat center center/cover;
    padding: 20px;
    box-sizing: border-box;
}

.search-container button i {
    font-size: 16px;
    color: white;
    text-decoration: none; /* Add this line */
}
a{
    text-decoration: none;
}






.search-container {
    display: flex;
    align-items: center;
    background-color: white;
    border-radius: 50px;
    padding: 10px 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    width: 70%;
    max-width: 600px;
    min-width: 280px;
}

.search-container input {
    border: none;
    outline: none;
    font-size: 16px;
    flex: 1;
    padding: 10px;
    border-radius: 50px;
}


.search-container button {
    background-color: black;
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

/* Responsive Grid Layout */
.Top-company-grid,
.grid {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    gap: 30px;
    padding: 30px;
    justify-items: center;
}

@media (min-width: 600px) {
    .Top-company-grid,
    .grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .search-container {
        width: 80%;
    }
}

@media (min-width: 900px) {
    .Top-company-grid,
    .grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (min-width: 1200px) {
    .Top-company-grid,
    .grid {
        grid-template-columns: repeat(4, 1fr);
    }

    .search-container {
        width: 60%;
    }
}

/* Responsive Product Cards */
.grid div {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease-in-out;
    width: 100%;
    max-width: 350px;
}

.grid div:hover {
    transform: translateY(-5px);
}

.grid img {
    width: 100%;
    height: auto;
    object-fit: cover;
}

.grid h3 {
    font-size: 1.2rem;
    margin: 15px 0;
}

.grid p {
    font-size: 1rem;
    color: #666;
}

/* Responsive Company Cards */
.Top-company-card {
    background-color: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 80%;
    max-width: 350px;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s;
    border: 1px solid #ddd;
}

.Top-company-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    border-color: #007bff;
}

.Top-company-card img {
    width: 110px;
    height: 110px;
    object-fit: cover;
    border-radius: 50%;
}

.Top-company-card h2 {
    font-size: 1.5rem;
    font-weight: 700;
    margin-top: 20px;
    text-align: center;
}

.Top-company-card p {
    font-size: 1rem;
    
    color: #555;
    margin-top: 12px;
}

@media (max-width: 768px) {
    .search-container {
        width: 90%;
        padding: 8px 15px;
    }

    .search-container input {
        font-size: 14px;
        padding: 8px;
    }

    .search-container button {
        width: 35px;
        height: 35px;
    }
}

@media (max-width: 480px) {
    .search-box {
        height: 20vh;
    }

    .search-container {
        width: 95%;
    }

    .Top-company-card,
    .grid div {
        width: 90%;
    }
}


/* Grid container */
.Top-company-grid {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    gap: 30px;
    padding: 30px;
    justify-items: center;
}

@media (min-width: 600px) {
    .Top-company-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 900px) {
    .Top-company-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (min-width: 1200px) {
    .Top-company-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

/* Product card */
.Top-company-card {
    background-color: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    width: 80%;
    max-width: 350px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s;
    border: 1px solid #ddd;
}

.Top-company-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

/* Product image */
.Top-company-card img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 50%;
}

/* Product title */
.Top-company-card h2 {
    font-size: 1.2rem;
    margin-top: 10px;
    font-weight: bold;
}

/* Price text */
.Top-company-card p {
    font-size: 1rem;
    margin-top: 5px;
    color: #555;
}

/* Add to Cart Button */
.Top-company-card form button {
    background-color: #16a34a; /* Tailwind green-600 */
    color: white;
    padding: 8px 16px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.Top-company-card form button:hover {
    background-color: #15803d; /* Tailwind green-700 */
}
 
</style>

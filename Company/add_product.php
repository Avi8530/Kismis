 <?php
session_start();
include_once "../db.php"; // Database connection

// Redirect if not logged in
if (!isset($_SESSION['COMPANY_LOGGED_IN'])) {
    header('Location: login.php');
    exit();
}

include('nav.php');

// Get company ID
$cid = $_SESSION['cid'] ?? 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
   

    // Upload image function
    function uploadImage($inputName, $prefix = 'product_') {
        if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] == 0) {
            $file_name = $prefix . uniqid();
            $extension = pathinfo($_FILES[$inputName]["name"], PATHINFO_EXTENSION);
            $basename = $file_name . "." . $extension;
            $tempname = $_FILES[$inputName]["tmp_name"];
            $folder = "productPic/{$basename}";

            if (move_uploaded_file($tempname, $folder)) {
                return $basename;
            }
        }
        return '';
    }

    // Upload images
    $image1 = uploadImage('image1');
    $image2 = uploadImage('image2');
    $image3 = uploadImage('image3');
    $image4 = uploadImage('image4');

    // Insert into DB
    $sql = "INSERT INTO products (pname, description, price, image, image2, image3, image4, cid) 
            VALUES ('$pname', '$description', '$price', '$image1', '$image2', '$image3', '$image4', '$cid')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New product added successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!-- PRODUCT FORM UI -->
<div class="product-form-wrapper">
    <div class="product-form-box">
        <h2>Add Product</h2>
        <form method="post" enctype="multipart/form-data">
            <label>Product Name:</label>
            <input type="text" name="pname" required>

            <label>Description:</label>
            <textarea name="description" rows="3" required></textarea>

            <label>Price (₹):</label>
            <input type="text" name="price" required>

            <label>Product Image 1:</label>
            <input type="file" name="image1" required>

            <label>Product Image 2:</label>
            <input type="file" name="image2" required>

            <label>Product Image 3:</label>
            <input type="file" name="image3" required>

            <label>Product Image 4:</label>
            <input type="file" name="image4" required>

            <button type="submit">Add Product</button>
        </form>
    </div>
</div>

<!-- STYLING: Classic Clean UI -->
<style>
body {
    background-color: #f5f5f5;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.product-form-wrapper {
    display: flex;
    justify-content: center;
    /* padding: 50px 20px; */
}

.product-form-box {
    background-color: white;
    width: 100%;
    max-width: 580px;
    padding: 05px 20px;
    border-radius: 10px;
    box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
}

.product-form-box h2 {
    text-align: center;
    margin-bottom: 10px;
    color: #333;
}

.product-form-box label {
    display: block;
    font-weight: 600;
    margin-bottom: 6px;
    color: #444;
}

.product-form-box input[type="text"],
.product-form-box input[type="file"],
.product-form-box textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 18px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 15px;
    box-sizing: border-box;
}

.product-form-box textarea {
    resize: vertical;
}

.product-form-box button {
    background-color: #007bff;
    color: white;
    font-size: 16px;
    padding: 12px;
    border: none;
    border-radius: 6px;
    width: 100%;
    cursor: pointer;
    transition: background 0.3s;
}

.product-form-box button:hover {
    background-color: #0056b3;
}
</style>

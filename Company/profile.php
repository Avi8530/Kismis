<?php
session_start();

include_once "../db.php"; // Ensure your database connection is included

// Check if the user is logged in
if (!isset($_SESSION['COMPANY_LOGGED_IN'])) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit(); // Ensure no further code is executed after the redirect
}

include('nav.php');



// Get the user_id from session
$user_id = $_SESSION['user_id']; // Assuming 'user_id' is stored in the session

// Fetch user profile from the database
$query = "SELECT * FROM company WHERE id = '$user_id'";
$result = mysqli_query($conn, $query); // Use correct database connection variable

// If the user is found in the database
if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
} else {
    echo "No user found.";
}

// Handle the form submission to update profile
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateProfile'])) {
    // Get user input from the form
    $cName = $_POST['cName'];
    $cEmail = $_POST['cEmail'];

    $cAddress = $_POST['cAddress'];
    $cCountry = $_POST['cCountry'];
    $cCDescription = $_POST['cCDescription'];
    $cIndustry = $_POST['cIndustry'];
    $cWebsite = $_POST['cWebsite'];

    // Update query
    $update_sql = "UPDATE company 
                   SET cName = '$cName', cEmail = '$cEmail', cAddress = '$cAddress', 
                       cCountry = '$cCountry', cCDescription = '$cCDescription', cIndustry = '$cIndustry', cWebsite = '$cWebsite' 
                   WHERE id = '$user_id'"; // Ensure the column name matches the table schema


    if (mysqli_query($conn, $update_sql)) {
        echo "Profile updated successfully.";
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
}

// Handle profile picture upload
if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
    $name   = 'Profile' . $user_id;
    $extension  = pathinfo($_FILES["profile_picture"]["name"], PATHINFO_EXTENSION);
    $basename   = $name . "." . $extension;

    $tempname = $_FILES["profile_picture"]["tmp_name"];
    $folder = "profilePic/{$basename}";

    // Update the profile picture in the database
    $sql = "UPDATE company SET profile_pic = '$basename' WHERE id = '$user_id'";

    // Execute the query and move the uploaded file
    if (mysqli_query($conn, $sql)) {
        move_uploaded_file($tempname, $folder);
        echo "Profile Photo Added Successfully.";
        header('Location: profile.php');
        exit; // Redirect after upload
    } else {
        echo "Failed to upload Data: " . mysqli_error($conn);
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/companyProfile.css">
</head>

<body class="bg-gray-100">
    <div class="container mt-3 p-6">
        <!-- Profile Header -->
        <div class="flex items-center bg-white p-6 rounded-lg shadow-lg mt-10">
            <div class="profile-header">
                <?php
                $profile_pic = !empty($user['profile_pic']) ? $user['profile_pic'] : 'https://via.placeholder.com/150';
                ?>
                <img src="profilePic/<?php echo $profile_pic; ?>" alt="company Photo">


                <div style="display: flex;">
                    <div>
                        <h2 class="text-2xl font-semibold"><?php echo $user['cName']; ?></h2>
                        <p><strong>Email:</strong> <?php echo $user['cEmail']; ?></p>

                        <p><strong>Address:</strong> <?php echo $user['cAddress']; ?></p>
                        <p><strong>Country:</strong> <?php echo $user['cCountry']; ?></p>
                        <p><strong>Website:</strong> <a href="<?php echo $user['cWebsite']; ?>" target="_blank"><?php echo $user['cWebsite']; ?></a></p>
                        <p><strong>Industry:</strong> <?php echo $user['cIndustry']; ?></p>
                    </div>
                    <!-- Edit button -->
                    <form method="post" enctype="multipart/form-data" id="profilePicForm">
                        <input type="file" name="profile_picture" accept="image/*" class="hidden" id="profile-picture-input">
                        <button type="button" onclick="document.getElementById('profile-picture-input').click()">Edit</button>
                        <button type="submit" id="jadugar" name="profilePic" class="hidden">Upload</button>
                    </form>

                </div>
            </div>
        </div>

        

        <!-- Biography Section -->
        <div class="bg-white p-6 rounded-lg shadow-lg mt-2 mb-2">
            <h3 class="text-xl font-semibold text-blue-500">Company Description</h3>
            <p><?php echo $user['cCDescription']; ?></p>
        </div>

        <!-- Contact Section -->
        <div class="bg-white p-6 rounded-lg  shadow-lg mb-6">
            <h3 class="text-xl font-semibold text-blue-500">Edit Profile</h3>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="form-group">
                        <label for="cName" class="block font-semibold text-gray-700">Name</label>
                        <input type="text" id="cName" name="cName" value="<?php echo htmlspecialchars($user['cName']); ?>" class="w-full p-3 border rounded" required>
                    </div>
                    <div class="form-group">
                        <label for="cEmail" class="block font-semibold text-gray-700">Email</label>
                        <input type="email" id="cEmail" name="cEmail" value="<?php echo htmlspecialchars($user['cEmail']); ?>" class="w-full p-3 border rounded" required>
                    </div>

                    <div class="form-group">
                        <label for="cAddress" class="block font-semibold text-gray-700">Address</label>
                        <input type="text" id="cAddress" name="cAddress" value="<?php echo htmlspecialchars($user['cAddress']); ?>" class="w-full p-3 border rounded" required>
                    </div>
                    <div class="form-group">
                        <label for="cCountry" class="block font-semibold text-gray-700">Country</label>
                        <input type="text" id="cCountry" name="cCountry" value="<?php echo htmlspecialchars($user['cCountry']); ?>" class="w-full p-3 border rounded" required>
                    </div>
                    <div class="form-group">
                        <label for="cCDescription" class="block font-semibold text-gray-700">Company Description</label>
                        <input type="text" id="cCDescription" name="cCDescription" value="<?php echo htmlspecialchars($user['cCDescription']); ?>" class="w-full p-3 border rounded" required>
                    </div>
                    <div class="form-group">
                        <label for="cIndustry" class="block font-semibold text-gray-700">Industry</label>
                        <input type="text" id="cIndustry" name="cIndustry" value="<?php echo htmlspecialchars($user['cIndustry']); ?>" class="w-full p-3 border rounded" required>
                    </div>
                    <div class="form-group">
                        <label for="cWebsite" class="block font-semibold text-gray-700">Website</label>
                        <input type="text" id="cWebsite" name="cWebsite" value="<?php echo htmlspecialchars($user['cWebsite']); ?>" class="w-full p-3 border rounded" required>
                    </div>
                </div>
                <button type="submit" name="updateProfile" class="mt-6 bg-blue-500 text-white py-2 px-4 rounded">Save Changes</button>
            </form>
        </div>

    </div>


    <script>
        // JavaScript to auto-submit the form when an image is selected
        document.getElementById('profile-picture-input').addEventListener('change', function() {
            if (this.files && this.files[0]) { // Ensure a file is selected
                document.getElementById('jadugar').click(); // Submit the form
            }
        });
    </script>

    <script type="text/javascript">
        // Pass the PHP session variable to JavaScript if the company_id is set
        <?php if (isset($_SESSION['company_id'])): ?>
            // Set sessionStorage and localStorage with the PHP value
            sessionStorage.setItem('cid', '<?php echo $_SESSION['company_id']; ?>');
            localStorage.setItem('cid', '<?php echo $_SESSION['company_id']; ?>');
        <?php endif; ?>
    </script>




</body>

</html>
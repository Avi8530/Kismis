<?php
session_start();
include_once "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $phone = trim($_POST["phone"]);
    $address = trim($_POST["address"]);
    $city = trim($_POST["city"]);
    $zip = trim($_POST["zip"]);
    $state = trim($_POST["state"]);
    $country = trim($_POST["country"]);

 

    $sql = "SELECT sEmail FROM buyer WHERE sEmail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        $insert_sql = "INSERT INTO buyer (sName, sEmail, sPassword, sPhone, sAddress, city, zip, state, country ) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("sssssssss", $name, $email, $password, $phone, $address, $city, $zip, $state, $country);
        if ($insert_stmt->execute()) {
            echo "<script>alert('Registration successful! Please login.'); window.location='login.php';</script>";
        } else {
            echo "Error: " . $insert_stmt->error;
        }
        $insert_stmt->close();
    } else {
        echo "<script>alert('Email already exists!');</script>";
    }
    $stmt->close();
}
?>

<!-- <html>

<head>
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(270deg, rgb(227, 234, 168), #b9fbc0);
            background-size: 400% 400%;
            animation: gradientAnimation 10s ease infinite;
        }

        @keyframes gradientAnimation {
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
    </style>
</head>

<body class="gradient-bg min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-6 bg-blue-500 text-white p-3 rounded-lg">Buyer Registration</h2>
        <form method="POST" class="space-y-4">
            <div>
                <label class="block text-gray-700 font-medium mb-2">Full Name:</label>
                <input type="text" name="name" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2">Email:</label>
                <input type="email" name="email" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Password:</label>
                    <input type="password" name="password" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Phone Number:</label>
                    <input type="text" name="phone" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2">Address:</label>
                <input type="text" name="address" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">City:</label>
                    <input type="text" name="city" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">State:</label>
                    <input type="text" name="state" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Pin Code:</label>
                    <input type="text" name="zip" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label for="country" class="block text-gray-700 font-medium mb-2">Country:</label>
                    <select id="country" name="country" required class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Select Country</option>
                        <option value="India">India</option>
                        <option value="USA">USA</option>
                        <option value="UK">UK</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-3 rounded-lg font-medium hover:bg-blue-600 transition duration-300">Register</button>
        </form>
    </div>
</body>

</html> -->


 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(45deg, #84fab0, #8fd3f4);
            background-size: 400% 400%;
            animation: gradient 12s ease infinite;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center px-4">
    <div class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-xl space-y-6">
        <h2 class="text-3xl font-bold text-center text-blue-600">👤 Create Account</h2>
        <form method="POST" class="space-y-4">
            <div class="flex gap-4">
                <input type="text" name="name" placeholder="Full Name" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
                <input type="text" name="phone" placeholder="Phone Number" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
            </div>

            <div class="flex gap-4">
                <input type="email" name="email" placeholder="Email" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
                <input type="password" name="password" placeholder="Password" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
            </div>

            <input type="text" name="address" placeholder="Address" required class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />

            <div class="grid grid-cols-2 gap-4">
                <input type="text" name="city" placeholder="City" required class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
                <input type="text" name="state" placeholder="State" required class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
            </div>

            <div class="grid grid-cols-2 gap-4">
                <input type="text" name="zip" placeholder="ZIP / Pin Code" required class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" />
                <select name="country" required class="p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <option value="">Select Country</option>
                    <option value="India">India</option>
                    <option value="USA">USA</option>
                    <option value="UK">UK</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-green-400 text-white p-3 rounded-lg font-semibold text-lg hover:from-blue-600 hover:to-green-500 transition duration-300 shadow-md">
                <i class="fas fa-user-plus mr-2"></i> Register
            </button>
        </form>
        <p class="text-center text-sm text-gray-600">Already registered? <a href="login.php" class="text-blue-600 font-medium hover:underline">Login</a></p>
    </div>
</body>
</html>

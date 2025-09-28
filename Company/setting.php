<?php
?>
<html>
<head>
    <title>Company Dashboard - Settings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="flex flex-col md:flex-row min-h-screen">
       
        <div class="flex-1 p-6">
            <h1 class="text-3xl font-bold mb-6">Settings</h1>
                        <!-- <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                            <h2 class="text-2xl font-semibold mb-4">Profile Settings</h2>
                            <label for="username" class="block mb-2">Username</label>
                            <input type="text" id="username" name="username" class="w-full p-2 border border-gray-300 rounded mb-4" placeholder="Enter your username">
                            <label for="email" class="block mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full p-2 border border-gray-300 rounded mb-4" placeholder="Enter your email">
                            <label for="password" class="block mb-2">Password</label>
                            <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded mb-4" placeholder="Enter your password">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save Changes</button>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                            <h2 class="text-2xl font-semibold mb-4">Company Settings</h2>
                            <label for="company-name" class="block mb-2">Company Name</label>
                            <input type="text" id="company-name" name="company-name" class="w-full p-2 border border-gray-300 rounded mb-4" placeholder="Enter company name">
                            <label for="company-email" class="block mb-2">Company Email</label>
                            <input type="email" id="company-email" name="company-email" class="w-full p-2 border border-gray-300 rounded mb-4" placeholder="Enter company email">
                            <label for="company-phone" class="block mb-2">Company Phone</label>
                            <input type="text" id="company-phone" name="company-phone" class="w-full p-2 border border-gray-300 rounded mb-4" placeholder="Enter company phone">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save Changes</button>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
                            <h2 class="text-2xl font-semibold mb-4">Notification Settings</h2>
                            <label for="email-notifications" class="block mb-2">Email Notifications</label>
                            <select id="email-notifications" name="email-notifications" class="w-full p-2 border border-gray-300 rounded mb-4">
                                <option value="enabled">Enabled</option>
                                <option value="disabled">Disabled</option>
                            </select>
                            <label for="sms-notifications" class="block mb-2">SMS Notifications</label>
                            <select id="sms-notifications" name="sms-notifications" class="w-full p-2 border border-gray-300 rounded mb-4">
                                <option value="enabled">Enabled</option>
                                <option value="disabled">Disabled</option>
                            </select>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save Changes</button>
                        </div> -->
           


            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">Logout</h2>
                <button type="button" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="logout()">Logout</button>
            </div>

        </div>
    </div>
</body>
</html>

        </div>
    </div>
    <script>
        function logout() {
            // Redirect to home page
            window.location.href = '../index.php';
        }
    </script>
</body>
</html>
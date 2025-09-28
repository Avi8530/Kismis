<?php
session_start(); // Make sure this is at the top

include_once "../db.php"; // Include DB early

// Check if the user is logged in
if (!isset($_SESSION['COMPANY_LOGGED_IN'])) {
    header('Location: login.php');
    exit();
}

include('nav.php'); // Now it's safe to include nav.php (after header logic)
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical B2B Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/responsive.css">
    
    <link rel="stylesheet" href="css/bootstrap.min.css"><style>
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .user-wrapper {
            display: flex;
            align-items: center;
        }

        .user-wrapper img {
            border-radius: 50%;
            margin-right: 15px;
        }

        .user-wrapper div {
            line-height: 1.4;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 90px;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .card-header i {
            font-size: 24px;
            color: #1abc9c;
        }

        .card h2 {
            font-size: 36px;
            margin: 0;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="main-content">
        <div class="cards">
            <div class="card">
                <div class="card-header">
                    <h3>Total Orders</h3>
                    <i class="fas fa-box"></i>
                </div>
                <h2>1,532</h2>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>New Clients</h3>
                    <i class="fas fa-user-plus"></i>
                </div>
                <h2>142</h2>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Revenue</h3>
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <h2>$12,432</h2>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3>Pending Issues</h3>
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <h2>24</h2>
            </div>
        </div>
    </div>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const sidebarMenu = document.getElementById('sidebar-menu');

        menuToggle.addEventListener('click', () => {
            sidebarMenu.classList.toggle('active');
        });
    </script>
</body>

</html>
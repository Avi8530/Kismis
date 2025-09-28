<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin-top: 100px;
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }

        .this-nav-bar- {
            width: 100%;
            background: #2c3e50;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            height: 70px;
            z-index: 10;
            padding: 0 20px;
        }

        .this-nav-bar- .logo {
            font-size: 26px;
            font-weight: bold;
        }

        .this-nav-bar- ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .this-nav-bar- ul li {
            margin: 0 20px;
        }

        .this-nav-bar- ul li a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            font-size: 16px;
            padding: 10px 15px;
            transition: 0.3s;
        }

        .this-nav-bar- ul li a:hover,
        .this-nav-bar- ul li a.active {
            background: #34495e;
            border-radius: 5px;
        }

        .menu-toggle {
            display: none;
            font-size: 30px;
            cursor: pointer;
        }

        .sidebar-menu {
            display: flex;
            justify-content: end;
            flex-direction: row;
            background: #2c3e50;
            position: absolute;

            right: 0;
            width: 100%;
            z-index: 20;
            padding-top: 20px;
        }

        .sidebar-menu.active {
            display: flex;
        }

        .sidebar-menu li {
            text-align: center;
            padding: 15px 0;
        }

        .sidebar-menu li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        @media (max-width: 768px) {
            .this-nav-bar- ul {
                display: none;
            }

            .sidebar-menu {
                display: none;
                flex-direction: column;
                width: 100%;
                position: absolute;
                top: 70px;
                left: 0;
                background: #34495e;
                padding: 0;
            }

            .sidebar-menu li {
                text-align: left;
                padding: 15px 20px;
                border-bottom: 1px solid #2c3e50;
            }

            .sidebar-menu li a {
                font-size: 16px;
            }

            .sidebar-menu.active {
                display: flex;
            }

            .menu-toggle {
                display: block;
            }

            .this-nav-bar- {
                padding: 0 15px;
            }

            .this-nav-bar- .logo {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>
    <div class="this-nav-bar-">
        <div class="logo">
            <i class="fas fa-bars menu-toggle" id="menu-toggle"></i>
        </div>
        <ul class="sidebar-menu" id="sidebar-menu">
            <li><a href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="product.php"><i class="fas fa-pills"></i> Products</a></li>
            <li><a href="orders.php"><i class="fas fa-box"></i> Orders</a></li>
            <li><a href="add_product.php"><i class="fas fa-cog"></i> Add Product</a></li>
            <li><a href="setting.php"><i class="fas fa-cog"></i> Settings</a></li>
        </ul>
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
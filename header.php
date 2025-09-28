 <?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Kismis B2C</title>

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <style>
    :root {
      --primary: #2563eb;
      --text: #1f2937;
      --light: #f9fafb;
      --white: #ffffff;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0
    }

    body {
      font-family: Segoe UI, Arial, sans-serif;
      background: var(--light);
      color: var(--text)
    }

    .headerH {
      position: sticky;
      top: 0;
      z-index: 50;
      background: linear-gradient(90deg, #6a1b9a, #8e24aa);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 5px 24px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }

    .brandH {
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .brandH img {
      height: 60px;
      width: auto;
      object-fit: contain;
      border-radius: 60%;
    }

    .brandH span {
      font-weight: 700;
      font-size: 1.2rem;
      color: #fff;
      letter-spacing: 0.5px;
    }

    .nav-rightH {
      display: flex;
      gap: 24px;
      align-items: center;
    }

    .nav-rightH a {
      text-decoration: none;
      color: #fff;
      font-weight: 600;
      padding: 8px 12px;
      border-radius: 6px;
      transition: 0.3s;
    }

    .nav-rightH a:hover {
      background: var(--primary);
      color: var(--white);
    }

    .hamburgerH {
      display: none;
      background: none;
      border: 0;
      cursor: pointer;
      padding: 6px;
    }

    .mobile-menuH {
      display: none;
      flex-direction: column;
      background: #6a1b9a;
      border-top: 1px solid #e5e7eb;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
      padding: 16px;
    }

    .mobile-menuH a {
      padding: 12px;
      font-weight: 600;
      text-decoration: none;
      color: #fff;
      border-radius: 6px;
    }

    .mobile-menuH a:hover {
      background: rgba(255, 255, 255, 0.2);
    }

    @media (max-width:768px) {
      .nav-rightH {
        display: none;
      }

      .hamburgerH {
        display: block;
      }
    }
  </style>
</head>

<body>

  <!-- Preloader -->
  <div class="preloader">
    <div class="loader">
      <div class="loader-outter"></div>
      <div class="loader-inner"></div>
      <div class="indicator">
        <svg width="16px" height="12px"></svg>
      </div>
    </div>
  </div>

  <!-- Header -->
  <header class="headerH">
    <div class="brandH">
      <img src="img/logo/logo5.png" alt="Kismis Logo">
    </div>

    <!-- Desktop Menu -->
    <nav class="nav-rightH" aria-label="Main navigation">
      <a href="index.php">Home</a>

      <?php if (isset($_SESSION['user_id'])): ?>
        <span style="color: #fff;">Welcome, <?= htmlspecialchars($_SESSION['user_name']); ?></span>
        <a href="logout.php" style="color: red;">Logout</a>
      <?php else: ?>
        <a href="Buyer/login.php">Login</a>
        <a href="Buyer/registration.php">Registration</a>
      <?php endif; ?>
    </nav>

    <!-- Hamburger -->
    <button class="hamburgerH" aria-expanded="false" onclick="toggleMenu(this)">
      <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="2"
        stroke-linecap="round" stroke-linejoin="round">
        <line x1="3" y1="6" x2="23" y2="6" />
        <line x1="3" y1="13" x2="23" y2="13" />
        <line x1="3" y1="20" x2="23" y2="20" />
      </svg>
    </button>
  </header>

  <!-- Mobile Menu -->
  <div id="mobileMenu" class="mobile-menuH">
    <a href="index.php">Home</a>
    <?php if (isset($_SESSION['user_id'])): ?>
      <a href="#" style="color: #fff;">Welcome, <?= htmlspecialchars($_SESSION['user_name']); ?></a>
      <a href="logout.php" style="color: red;">Logout</a>
    <?php else: ?>
      <a href="Buyer/login.php">Login</a>
      <a href="Buyer/registration.php">Registration</a>
    <?php endif; ?>
  </div>

  <script>
    function toggleMenu(btn) {
      const menu = document.getElementById('mobileMenu');
      const isOpen = menu.style.display === 'flex';
      menu.style.display = isOpen ? 'none' : 'flex';
      btn.setAttribute('aria-expanded', !isOpen);
    }

    window.addEventListener('resize', () => {
      if (window.innerWidth > 768) {
        document.getElementById('mobileMenu').style.display = 'none';
        document.querySelector('.hamburger').setAttribute('aria-expanded', 'false');
      }
    });
  </script>

  <!-- Scripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.0.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/easing.js"></script>
  <script src="js/colors.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.nav.js"></script>
  <script src="js/slicknav.min.js"></script>
  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/niceselect.js"></script>
  <script src="js/tilt.jquery.min.js"></script>
  <script src="js/owl-carousel.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/steller.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>

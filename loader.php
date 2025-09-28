<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kishmish Wala - Preloader Example</title>
  <style>
    /* Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background: #fafafa;
    }

    /* Preloader Background */
    .preloader {
      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, #7b1fa2, #ab47bc); /* grape gradient */
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 9999;
    }

    /* Loader wrapper */
    .loader {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* Grape Image */
    .grape-loader {
      width: 90px;
      height: auto;
      animation: bounce 1.2s infinite ease-in-out;
    }

    /* Bounce animation */
    @keyframes bounce {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-25px);
      }
    }

    /* Page Content */
    .content {
      display: none; /* hidden until preloader disappears */
      padding: 20px;
      text-align: center;
    }

    .content h1 {
      color: #6a1b9a;
    }
  </style>
</head>
<body>

  <!-- Preloader -->
  <div class="preloader">
    <div class="loader">
      <img src="grapes.png" alt="Loading..." class="grape-loader">
    </div>
  </div>

  <!-- Main Content -->
  <div class="content">
    <h1>Welcome to Kishmish Wala 🍇</h1>
    <p>Your organic raisins store is ready!</p>
  </div>

  <!-- JavaScript -->
  <script>
    window.addEventListener("load", function() {
      document.querySelector(".preloader").style.display = "none";
      document.querySelector(".content").style.display = "block";
    });
  </script>

</body>
</html>

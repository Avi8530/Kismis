<?php
session_start(); // Start session at the very top
include_once "../db.php";

// Initialize variables
$error_message = ''; // Variable to hold error messages
   
// Check if the form is submitted
if (isset($_POST['loginSubmit'])) {
  // Get user inputs and escape to prevent SQL injection
  $cEmail = mysqli_real_escape_string($conn, $_POST['cEmail']);
  $cPassword = $_POST['cPassword'];

  // Query to find the user by email
  $query = "SELECT * FROM company WHERE cEmail = '$cEmail'";

  $result = mysqli_query($conn, $query);

  if ($result) {
    // Check if the email exists in the database
    $user = mysqli_fetch_assoc($result);
    if ($user) {

      // Verify the password with the stored hash
      if ($password === $user['sPassword'])  {
        // Set session variables if login is successful
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_type'] = 'company';
        $_SESSION['COMPANY_LOGGED_IN'] = true;
        $_SESSION['cid'] = $user['cid'];

        // Debug: Check if cid is set
        if (!empty($_SESSION['cid'])) {
          header('Location: index.php');
          exit;
      } else {
          $error_message = "Error: Company ID not set.";
          error_log("Login attempt: cid not set for user $cEmail");
      }
  } else {
      $error_message = "Incorrect password! Please try again.";
  }
} else {
  $error_message = "No user found with that email! Please try again.";
}
} else {
$error_message = "Error executing query: " . mysqli_error($conn);
}
mysqli_close($conn);
}
?>



<html>

<head>
  <title>LOGIN</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
</head>

<body>
  <div class="container">
    <div class="image-container">
      <img alt="Herbal medicine with pills and leaves" height="450" src="https://storage.googleapis.com/a1aa/image/5Kxn5LBSn6LjM9hG2RUocYPpBEiIfiE2sH2OfuY0LX2uab8TA.jpg" width="450" />
    </div>

    <div class="form-container">
      <div class="logo">
        <img alt="Dawa Pharma Logo" height="50" src="https://storage.googleapis.com/a1aa/image/be0bs7m6evpGcEkbsUsef1OWe20M7PBfsLafNTRtlo1IYtNeTA.jpg" width="50" />
        <div>
          <h1>
            DAWA
            <span>PHARMA</span>
          </h1>
          <p>PHARMA AGENCY SOFTWARE</p>
        </div>
      </div>
      <form method="post" action="login.php">
        <?php if (!empty($error_message)): ?>
          <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <label for="cEmail">Email </label>
        <input id="cEmail" name="cEmail" placeholder="cEmail" type="email" required />

        <label for="cPassword">Password</label>
        <input id="cPassword" name="cPassword" placeholder="cPassword" type="password" required />

        <button type="submit" name="loginSubmit">SIGN IN</button>
        <p style="text-align: center;">Don't have an account?
          <a href="registration.php" style="text-decoration: none; color: blue;">Registration</a>
        </p>
      </form>
    </div>
  </div>



</body>

</html>



<style>
  body {
    margin: 0;
    font-family: 'Roboto', sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f5f5f5;
  }

  .container {
    display: flex;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    max-width: 900px;
    width: 100%;
  }

  .form-container {
    padding: 40px;
    flex: 1;
  }

  .form-container h1 {
    font-size: 24px;
    margin-bottom: 20px;
  }

  .form-container label {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
  }

  .form-container input[type="email"],
  .form-container input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  .form-container .remember-me {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
  }

  .form-container .remember-me input {
    margin-right: 10px;
  }

  .form-container .remember-me label {
    margin: 0;
  }

  .form-container .forgot-password {
    color: #007bff;
    text-decoration: none;
    font-size: 14px;
  }

  .form-container .forgot-password:hover {
    text-decoration: underline;
  }

  .form-container button {
    width: 100%;
    padding: 10px;
    background-color: #003366;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
  }

  .form-container button:hover {
    background-color: #002244;
  }

  .image-container {
    flex: 1;
    background-color: #f5f5f5;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
  }

  .image-container img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
  }

  .logo {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
  }

  .logo img {
    height: 50px;
    margin-right: 10px;
  }

  .logo h1 {
    font-size: 24px;
    margin: 0;
    color: #003366;
  }

  .logo h1 span {
    color: #28a745;
  }

  .logo p {
    margin: 0;
    color: #666;
    font-size: 14px;
  }

  @media (max-width: 768px) {
    .container {
      flex-direction: column;
      max-width: 100%;
      height: auto;
    }

    .form-container {
      padding: 20px;
    }

    .image-container {
      padding: 10px;
    }
  }
</style>
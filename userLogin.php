 <?php
session_start();
require_once 'db.php'; // Database connection ($conn)

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!$email || !$password) {
        $error = 'Email and password are required.';
    } else {
     

            $sql = "SELECT * FROM buyer WHERE sEmail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            $user = $result->fetch_assoc();
            $_SESSION['user_id'] = $user['id'];
            header('Location: my_orders.php');
            exit;
        } else {
            $error = 'Invalid email or password.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Login</title>
<style>
  /* Reset some basics */
  *, *::before, *::after {
    box-sizing: border-box;
  }
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f0f2f5;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  .login-container {
    background: #fff;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 400px;
  }
  h2 {
    margin-bottom: 30px;
    font-weight: 700;
    color: #333;
    text-align: center;
  }
  form {
    display: flex;
    flex-direction: column;
  }
  label {
    font-weight: 600;
    margin-bottom: 8px;
    color: #555;
  }
  input[type="email"],
  input[type="password"] {
    padding: 12px 15px;
    margin-bottom: 20px;
    border: 1.8px solid #ddd;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s;
  }
  input[type="email"]:focus,
  input[type="password"]:focus {
    border-color: #0052cc;
    outline: none;
  }
  button {
    background: #0052cc;
    color: white;
    padding: 14px;
    font-size: 1rem;
    font-weight: 700;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s;
  }
  button:hover {
    background: #003d99;
  }
  .error {
    background: #ffdddd;
    border: 1px solid #ff5c5c;
    color: #a70000;
    padding: 12px 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    font-weight: 600;
    text-align: center;
  }
  @media (max-width: 480px) {
    .login-container {
      padding: 30px 20px;
      border-radius: 10px;
      width: 90%;
    }
  }
</style>
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <?php if ($error): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="POST" action="">
      <label for="email">Email</label>
      <input id="email" type="email" name="email" required value="<?= htmlspecialchars($email ?? '') ?>" />

      <label for="password">Password</label>
      <input id="password" type="password" name="password" required />

      <button type="submit">Log In</button>
    </form>
  </div>
</body>
</html>

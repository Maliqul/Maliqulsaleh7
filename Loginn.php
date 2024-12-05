<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Mulai session jika belum aktif
}
include 'Config.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa username
    $query = "SELECT * FROM pengguna WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        // Simpan informasi user ke session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: LandingPage.php"); // Redirect ke halaman dashboard
        exit;
    } else {
        $error = "Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #152238;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 350px;
            background: #1E2D4E;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            color: #fff;
        }
        .container h1 {
            margin-bottom: 2rem;
            font-weight: 600;
            font-size: 24px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 0.5rem;
            font-size: 14px;
            text-align: left;
            color: #A5B3CC;
        }
        input[type="text"], input[type="password"] {
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-bottom: 1rem;
            background: #243759;
            color: #fff;
            font-size: 14px;
        }
        input[type="submit"] {
            padding: 10px;
            border-radius: 5px;
            border: none;
            background: #307CF9;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background: #245ED6;
        }
        .error {
            margin-bottom: 1rem;
            color: #FF4C4C;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login" name="login">
            <div class="form-footer">
    <p>Belum punya akun? <a href="Registrasi.php" style="color: #307CF9;">Daftar di sini</a></p>
</div>

        </form>
    </div>
</body>
</html>

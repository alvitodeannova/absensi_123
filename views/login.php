<?php session_start(); if (isset($_SESSION['user_id'])) { header('Location: dashboard.php'); exit; } ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Absensi</title>
  <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
  <div class="login-box">
    <h2>Login Absensi</h2>
    <?php if (isset($_GET['error'])): ?>
      <div class="error">Username atau password salah!</div>
    <?php endif; ?>
    <form action="../proses/login.php" method="post">
      <input type="text" name="username" placeholder="Username" autofocus required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Masuk</button>
    </form>
    <p style="text-align:center; margin-top:10px;">
  Belum punya akun? <a href="register.php">Daftar di sini</a>
</p>
  </div>
</body>
</html>
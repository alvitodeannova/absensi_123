<?php
session_start();
require_once('../config/db.php');

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Ambil data dari database
$stmt = $conn->prepare('SELECT id, password FROM users WHERE username = ?');
$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->bind_result($id, $stored_password);

if ($stmt->fetch() && $password === $stored_password) {
  $_SESSION['user_id']  = $id;
  $_SESSION['username'] = $username;
  header('Location: ../views/dashboard.php');
  exit;
}

header('Location: ../views/login.php?error=1');
exit;
?>

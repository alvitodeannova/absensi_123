<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: ../views/login.php');
  exit;
}
require_once('../config/db.php');

$user_id = $_SESSION['user_id'];
$date    = date('Y-m-d');
$time    = date('H:i:s');

$stmt = $conn->prepare('INSERT INTO absensi (user_id, tanggal, jam_masuk) VALUES (?,?,?)
                        ON DUPLICATE KEY UPDATE jam_masuk = VALUES(jam_masuk)');
$stmt->bind_param('iss', $user_id, $date, $time);
$stmt->execute();

$_SESSION['flash'] = 'Check‑in berhasil!';
header('Location: ../views/dashboard.php');
?>
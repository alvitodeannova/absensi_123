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

$stmt = $conn->prepare('UPDATE absensi SET jam_keluar = ? WHERE user_id = ? AND tanggal = ?');
$stmt->bind_param('sis', $time, $user_id, $date);
$stmt->execute();

$_SESSION['flash'] = 'Check‑out berhasil!';
header('Location: ../views/dashboard.php');
?>
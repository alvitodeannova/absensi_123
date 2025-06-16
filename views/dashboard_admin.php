<?php
session_start();
require_once('config/db.php');

// Cek apakah user sudah login dan merupakan admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit;
}

// Ambil data admin (opsional, jika ingin menampilkan nama admin)
$user_id = $_SESSION['user_id'];
$query = $conn->prepare("SELECT nama FROM users WHERE id = ?");
$query->bind_param('i', $user_id);
$query->execute();
$query->bind_result($nama_admin);
$query->fetch();
$query->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        a {
            display: inline-block;
            margin: 10px 0;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h1>Selamat Datang, <?= htmlspecialchars($nama_admin) ?> (Admin)</h1>

    <p>Silakan pilih menu di bawah:</p>

    <a href="admin_cek_absen.php">Lihat Absensi Karyawan Hari Ini</a>
    <a href="proses/logout.php">Logout</a>

</body>
</html>

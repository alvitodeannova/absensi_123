<?php
// config/db.php
$host   = 'localhost';
$user   = 'root';      // ubah jika Anda memakai user MySQL berbeda
$pass   = '';          // isi password MySQL
$dbname = 'absensi';   // nama database

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}
?>
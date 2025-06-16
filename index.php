<?php
// index.php
// Redirect pengguna sesuai status login
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: views/dashboard.php');
    exit;
}
header('Location: views/login.php');
exit;
?>
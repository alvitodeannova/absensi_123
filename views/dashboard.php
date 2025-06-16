<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}
require_once('../config/db.php');

$user_id = $_SESSION['user_id'];
$stmt    = $conn->prepare('SELECT tanggal, jam_masuk, jam_keluar FROM absensi WHERE user_id = ? ORDER BY tanggal DESC');
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$rows   = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Absensi</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <script defer src="../assets/js/script.js"></script>
</head>
<body>
  <div class="container">
    <h1>Halo, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>

    <div class="flex" style="margin-bottom: 20px;">
      <form action="../proses/checkin.php" method="post">
        <button class="btn" type="submit">Check‑In</button>
      </form>
      <form action="../proses/checkout.php" method="post">
        <button class="btn" type="submit">Check‑Out</button>
      </form>
      <a class="btn" href="../proses/logout.php">Logout</a>
    </div>

    <h2>Riwayat Absensi</h2>
    <div class="table-wrapper">
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Jam Masuk</th>
            <th>Jam Keluar</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($rows): $no = 1; foreach ($rows as $row): ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $row['tanggal']; ?></td>
              <td><?php echo $row['jam_masuk'] ?: '-'; ?></td>
              <td><?php echo $row['jam_keluar'] ?: '-'; ?></td>
            </tr>
          <?php endforeach; else: ?>
            <tr><td colspan="4">Belum ada data absensi.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
-- Buat database (jalankan di phpMySQL atau MySQL client)
CREATE DATABASE IF NOT EXISTS absensi CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE absensi;

-- Tabel pengguna
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

-- Tabel absensi
CREATE TABLE absensi (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  tanggal DATE NOT NULL,
  jam_masuk TIME NULL,
  jam_keluar TIME NULL,
  UNIQUE KEY unique_absen (user_id, tanggal),
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Tambah akun admin (password: admin123)
INSERT INTO users (username, password) VALUES
  ('admin', 'admin123');


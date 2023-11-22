<?php
// Buatlah perkondisian jika tidak bisa terkoneksi ke database maka akan mengeluarkan errornya

$host = "localhost:3306";  // Sesuaikan dengan host database Anda
$username = "root";   // Sesuaikan dengan username database Anda
$password = "";       // Sesuaikan dengan password database Anda
$database = "modul4"; // Sesuaikan dengan nama database Anda

// Membuat koneksi ke database
$connect = mysqli_connect($host, $username, $password, $database);

// Memeriksa koneksi
if (!$connect) {
    die("Koneksi database gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi database berhasil!";
}
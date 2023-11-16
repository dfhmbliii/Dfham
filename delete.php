<?php
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
include "connect.php";

// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
$id = $_GET['id'];

// (3) Buatkan perintah SQL DELETE untuk menghapus data dari tabel berdasarkan id mobil
$query = "DELETE FROM showroom_mobil WHERE id = $id";

// (4) Buatkan perkondisi jika eksekusi query berhasil
if (mysqli_query($connect, $query)) {
    echo "Data mobil berhasil dihapus.";
} else {
    echo "Error deleting record: " . mysqli_error($connect);
}

// Tutup koneksi ke database setelah selesai menggunakan database
mysqli_close($connect);
?>

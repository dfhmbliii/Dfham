<!-- Pada file ini kalian membuat coding untuk logika delete / menghapus data mobil pada showroom sesuai id-->
<?php 
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
include "connect.php";
// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
$id_mobil = isset($_GET['id']) ? $_GET['id'] : ''; // Mengambil ID dari URL

// Memeriksa apakah ID mobil tersedia
if($id_mobil) {
    // (3) Buatkan perintah SQL DELETE untuk menghapus data dari tabel berdasarkan id mobil
    $sql = "DELETE FROM nama_tabel_mobil WHERE id = ?"; // Ganti nama_tabel_mobil dengan nama tabel Anda

    // Mempersiapkan statement untuk eksekusi
    $stmt = $koneksi->prepare($sql);

    // Mengikat parameter ke query
    $stmt->bind_param("i", $id_mobil); // "i" artinya tipe data integer

    // (4) Buatkan perkondisi jika eksekusi query berhasil
    if($stmt->execute()) {
        echo "Data mobil berhasil dihapus.";
    } else {
        echo "Terjadi kesalahan saat menghapus data: " . $stmt->error;
    }

    // Menutup statement
    $stmt->close();
}

// Tutup koneksi ke database setelah selesai menggunakan database
$koneksi->close();
?>
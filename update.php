<?php
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
include "connect.php";

// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
$id = $_GET['id'];

// (3) Buatkan fungsi "update" yang menerima data sebagai parameter
function updatemobil($connect, $id, $nama_mobil, $brand_mobil, $warna_mobil, $tipe_mobil, $harga_mobil) {
    // Dapatkan data yang dikirim sebagai parameter dan simpan dalam variabel yang sesuai.
    
    // Buatkan perintah SQL UPDATE untuk mengubah data di tabel, berdasarkan id mobil
    $query = "UPDATE showroom_mobil SET
              nama_mobil = '$nama_mobil',
              brand_mobil = '$brand_mobil',
              warna_mobil = '$warna_mobil',
              tipe_mobil = '$tipe_mobil',
              harga_mobil = '$harga_mobil'
              WHERE id = $id";

    // Eksekusi perintah SQL
    if (mysqli_query($connect, $query)) {
        // Jika terdapat kesalahan, buatkan eksekusi query berhasil
        echo "Data mobil berhasil diperbarui.";
    } else {
        // Jika terdapat kesalahan, buatkan eksekusi query gagalnya
        echo "Error updating record: " . mysqli_error($connect);
    }
}

// Check if the form is submitted (update button is clicked)
if(isset($_POST['update'])){
    // Get data from the form
    $nama_mobil = $_POST['nama_mobil'];
    $brand_mobil = $_POST['brand_mobil'];
    $warna_mobil = $_POST['warna_mobil'];
    $tipe_mobil = $_POST['tipe_mobil'];
    $harga_mobil = $_POST['harga_mobil'];

    // Call the update function with the provided data
    updatemobil($connect, $id, $nama_mobil, $brand_mobil, $warna_mobil, $tipe_mobil, $harga_mobil);
}

// Tutup koneksi ke database setelah selesai menggunakan database
mysqli_close($connect);
?>

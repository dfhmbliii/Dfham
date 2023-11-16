<?php
// (1) Don't forget to include the database connection file
include "connect.php";

// (2) Check if the current request is using the POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // (3) Retrieve data from the form (use POST method)
    $nama_mobil = $_POST['nama_mobil'];
    $brand_mobil = $_POST['brand_mobil'];
    $warna_mobil = $_POST['warna_mobil'];
    $tipe_mobil = $_POST['tipe_mobil'];
    $harga_mobil = $_POST['harga_mobil'];

    // (4) Execute the SQL query to add data to the showroom_mobil table
    $query = "INSERT INTO showroom_mobil (nama_mobil, brand_mobil, warna_mobil, tipe_mobil, harga_mobil) 
              VALUES ('$nama_mobil', '$brand_mobil', '$warna_mobil', '$tipe_mobil', '$harga_mobil')";

    if (mysqli_query($connect, $query)) {
        // (5) Query executed successfully
        echo "Data added successfully";
    } else {
        // (6) Query execution failed
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }

    // (7) Close the database connection after use
    mysqli_close($connect);
}
?>
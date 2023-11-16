<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Mobil</title>
</head>
<body>
    <?php include("navbar.php") ?>
    <center>
        <div class="container">
            <h1>List Mobil</h1>

            <?php
            include("connect.php");

            // Buatlah query untuk mengambil data dari database (gunakan query SELECT)
            $query = "SELECT * FROM showroom_mobil";

            // Eksekusi query
            $result = mysqli_query($connect, $query);

            // Buatlah perkondisian dimana:
            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>Nama Mobil</th>
                            <th>Brand Mobil</th>
                            <th>Warna Mobil</th>
                            <th>Tipe Mobil</th>
                            <th>Harga Mobil</th>
                            <th>Action</th>
                        </tr>";

          
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['nama_mobil']}</td>
                            <td>{$row['brand_mobil']}</td>
                            <td>{$row['warna_mobil']}</td>
                            <td>{$row['tipe_mobil']}</td>
                            <td>{$row['harga_mobil']}</td>
                            <td><a href='form_detail_mobil.php?id={$row['id']}'>Detail</a></td>
                          </tr>";
                }

                echo "</table>";
            } else {
         
                echo "Tidak ada data dalam tabel.";
            }

       
            mysqli_close($connect);
            ?>
        </div>
    </center>
</body>
</html>

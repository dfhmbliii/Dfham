<?php
session_start();

require '../config/connect.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}

// (1) Buat variabel untuk menampung id user berdasarkan session dengan key id
//     Kemudian lakukan query untuk mencari id user menggunakan variabel yang sudah dibuat
$userid = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$userid'";
$result = mysqli_query($connect, $query);

// (2) Buatlah perkondisian ketika id ditemukan ( gunakan mysqli_num_rows == 1 )
if (mysqli_num_rows($result) == 1) {
    // a. Simpan hasil query menjadi array asosiatif menggunakan fungsi mysqli_fetch_assoc dalam variabel $data
    $data = mysqli_fetch_assoc($result);
} else {
    // Handle the case when user data is not found
    echo "User tidak ditemukan.";
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ShowRoom Mobil EAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>


    <div class="container d-flex min-vh-100 justify-content-center align-items-center">
        <div class="text-center">

            <h1 class="mb-3">👋 Hello, <?= $data["name"] ?></h1>
            <h1 class="mb-5">Selamat datang di Showroom Mobil!</h1>

            <form action="../config/LogoutController.php" method="post">
                <button type="submit" class="btn btn-danger" name="logout">Logout</button>
            </form>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>

                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container d-flex min-vh-100 justify-content-center align-items-center">
        <div class="text-center">

        <h1 class="mb-3">👋 Hello, <?= $data["name"] ?></h1>
        <h1 class="mb-5">Selamat datang di Showroom Mobil!</h1>

        <form action="../config/LogoutController.php" method="post">
            <button type="submit" class="btn btn-danger" name="logout">Logout</button>
        </form>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
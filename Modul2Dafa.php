<?php

$bmi = null;
$status = null;
$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tinggi_badan = isset($_POST['tinggi_badan']) ? $_POST['tinggi_badan'] : null;
    $berat_badan = isset($_POST['berat_badan']) ? $_POST['berat_badan'] : null;

    if (empty($tinggi_badan) || empty($berat_badan)) {
        $error = "Tinggi badan dan berat badan tidak boleh kosong";
    } else {
        $tinggi_in_meter = $tinggi_badan / 100;  
        $bmi = $berat_badan / ($tinggi_in_meter * $tinggi_in_meter);

      
        if ($bmi <= 18.4) {
            $status = "Kurang";
        } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
            $status = "Normal";
        } elseif ($bmi >= 25 && $bmi <= 39.9) {
            $status = "Kelebihan Dikit";
        } else {
            $status = "Obesitas Kali";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator BMI</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Kalkulator BMI</h4>
                        <form action="" method="POST">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" name="tinggi_badan" id="tinggi_badan" placeholder="175">
                                <label for="tinggi_badan">Tinggi Badan (CM)</label>
                            </div>
                            <div class="form-floating">
                                <input type="number" class="form-control" name="berat_badan" id="berat_badan" placeholder="53">
                                <label for="berat_badan">Berat Badan (KG)</label>
                            </div>
                            <button type="submit" class="btn btn-primary mb-3 mt-3 w-100">Hitung BMI</button>
                        </form>

                        <?php if ($bmi !== null) : ?>
                            <p>Your BMI is: <?= number_format($bmi, 2) ?>, Status: <?= $status ?></p>
                        <?php endif; ?>

                        <?php if ($error) : ?>
                            <p class="text-danger"><?= $error ?></p>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>

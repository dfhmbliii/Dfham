<?php

require 'connect.php';

// function untuk melakukan login
function login($input) {

    // (1) Panggil variabel global $connect dari file config
    global $connect;
    // 

    // (2) Ambil nilai input dari form login
        // a. Ambil nilai input email
        $email = $_POST['email'];
        // b. Ambil nilai input password
        $password = $_POST['password'];
    // 

    // (3) Buat dan lakukan query untuk mencari data dengan email yang sama
        $query = "SELECT * From users where email = '$email'";
        $result = mysqli_query($connect,$query);
    // 

    // (4) Buatlah perkondisian ketika email ditemukan ( gunakan mysqli_num_rows == 1 )
        if(mysqli_num_rows($result) ==1){
        // a. Simpan hasil query menjadi array asosiatif menggunakan fungsi mysqli_fetch_assoc
        $data = mysqli_fetch_assoc($result);
        // 
    
        // b. Lakukan verifikasi password menggunakan fungsi password_verify
         if(password_verify($password, $data['password'])){
            // c. Set variabel session dengan key login untuk menyimpan status login
        $_SESSION["login"] = true;
            // d. Set variabel session dengan key id untuk menyimpan id user
        $_SESSION["username"] = $data['username'];
            //
        }
        if(isset($input["remember"])){
            // e. Buat kondisi untuk mengecek apakah checkbox "remember me" terisi kemudian set cookie dan isi dengan id
            setcookie('id', $data['id'], time() + 3600);
            
            // 
        // f. Buat kondisi else dan isi dengan variabel session dengan key message untuk meanmpilkan pesan error ketika password tidak sesuai
    }else{
        $_SESSION['message']='password salah';
        $_SESSION['color'] = 'danger';
        }
    }else{
        $_SESSION['message']='email tidak ditemukan salah';
        $_SESSION['color'] = 'danger';
    }
    }
        // 
    // 

    // (5) Buat kondisi else, kemudian di dalamnya
    //     Buat variabel session dengan key message untuk menampilkan pesan error ketika email tidak ditemukan
    
    // 

// 

// function untuk fitur "Remember Me"
function rememberMe($cookie)
{
    // (6) Panggil variabel global $connect dari file config
    global $connect;
    // 

    // (7) Ambil nilai cookie yang ada
    $id = $cookie['id'];
    // 

    // (8) Buat dan lakukan query untuk mencari data dengan id yang sama
    $query = "SELECT * FROM users where id = 'id'";
    // 
    
    // (9) Buatlah perkondisian ketika id ditemukan ( gunakan mysqli_num_rows == 1 )
    if(mysqli_num_rows($result) == 1){
        // a. Simpan hasil query menjadi array asosiatif menggunakan fungsi mysqli_fetch_assoc
        $data = mysqli_fetch-assoc($result);
        // b. Set variabel session dengan key login untuk menyimpan status login
        $_SESSION["login"] = true;
        // c. Set variabel session dengan key id untuk menyimpan id user
        $_SESSION["username"] = $data['username'];
    }
    // 
}
// 

?>
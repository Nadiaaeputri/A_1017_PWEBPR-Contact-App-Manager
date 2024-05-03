<?php
require_once 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari formulir
    $nama = $_POST['longname'] ?? '';
    $umur = $_POST['age'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validasi data input
    if (empty($nama) || empty($umur) || empty($username) || empty($password)) {
        $error = "Mohon isi semua kolom!";
    } else {
        // Cek apakah username sudah terdaftar
        $check_query = "SELECT * FROM data_akun WHERE username ='$username'";
        $check_result = mysqli_query($conn, $check_query);
        if (mysqli_num_rows($check_result) > 0) {
            $error = "Username sudah terdaftar!";
        } else {
            // Menyimpan data ke database
            $insert_query = "INSERT INTO data_akun (nama, umur, username, password) VALUES ('$nama', '$umur', '$username', '$password')";
            if (mysqli_query($conn, $insert_query)) {
                // Registrasi berhasil, redirect ke halaman login
                header("Location: login.php");
                exit;
            } else {
                $error = "Terjadi kesalahan saat mendaftar: " . mysqli_error($conn);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <div class="form-header">
                <h2>Sign up</h2> <br>
            </div>
            <form action="registrasi.php" method="post"> <!-- Ganti action menjadi registrasi.php -->
                <div class="field input">
                    <label for="longname">Nama</label>
                    <input type="text" name="longname" id="longname" required>
                </div>
                <div class="field input">
                    <label for="age">Umur</label>
                    <input type="text" name="age" id="age" required>
                </div>
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="field">
                    <input type="submit" name="submit" class="button" value="Sign Up">
                </div>
                <?php if (isset($error)) { ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php } ?>
                <div class="link"> 
                    Sudah punya akun? <a href="login.php">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

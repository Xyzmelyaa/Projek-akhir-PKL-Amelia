<?php
// Data login yang diperbolehkan
$valid_email = "admin@example.com"; // Ganti dengan email yang diinginkan
$valid_password = "password123";    // Ganti dengan password yang diinginkan

// Mulai session untuk menyimpan informasi login
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form login
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validasi kredensial
    if ($email === $valid_email && $password === $valid_password) {
        // Jika berhasil login, simpan status ke session
        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $email;

        // Redirect ke halaman dashboard atau halaman lain
        header("Location: admin.php");
        exit;
    } else {
        // Jika gagal login, kirim pesan error
        $error_message = "Email atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Gagal</title>
</head>
<body>
    <?php if (isset($error_message)): ?>
        <p style="color: red; text-align: center;"> <?php echo $error_message; ?> </p>
    <?php endif; ?>
    <p style="text-align: center;">
        <a href="login.php">Kembali ke halaman login</a>
    </p>
</body>
</html>

<?php
$conn = new mysqli("localhost", "root", "", "lautinaja");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if ($password !== $confirm) {
        echo "<script>alert('Konfirmasi password tidak cocok!');history.back();</script>";
        exit;
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    
    // Cek token dan update
    $result = $conn->query("SELECT * FROM users WHERE reset_token = '$token'");
    if ($result->num_rows > 0) {
        $conn->query("UPDATE users SET password='$passwordHash', reset_token=NULL WHERE reset_token = '$token'");
        echo "<script>
            alert('Password berhasil diperbarui!');
            window.location.href = 'login-form.php';
        </script>";
    } else {
        echo "<script>alert('Token tidak valid atau sudah digunakan!');</script>";
    }
}
?>

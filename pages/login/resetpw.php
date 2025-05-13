<?php
require 'db.php'; // arahkan ke file koneksi

$email = $_POST['email'];
$token = bin2hex(random_bytes(32));
$expires = date("Y-m-d H:i:s", strtotime('+1 hour'));

// Hapus token lama
$conn->query("DELETE FROM password_resets WHERE email = '$email'");

// Simpan token baru
$stmt = $conn->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $email, $token, $expires);
$stmt->execute();

// Kirim link via email (disimulasikan dengan echo link)
$link = "http://localhost/Platform-Logistik-Maritim/pages/login/update-password.html?token=$token";
echo "Klik link berikut untuk reset password: <a href='$link'>$link</a>";

$stmt->close();
$conn->close();
?>

<?php
require 'db.php';

$token = $_POST['token'];
$password = $_POST['password'];
$confirm = $_POST['confirm_password'];

if ($password !== $confirm) {
    die("Password tidak cocok.");
}

// Ambil data berdasarkan token
$stmt = $conn->prepare("SELECT email, expires_at FROM password_resets WHERE token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 1) {
    $stmt->bind_result($email, $expires_at);
    $stmt->fetch();

    if (strtotime($expires_at) < time()) {
        die("Token kadaluarsa.");
    }

    // Update password
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $update = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
    $update->bind_param("ss", $hashed, $email);
    $update->execute();

    // Hapus token
    $conn->query("DELETE FROM password_resets WHERE email = '$email'");

    echo "Password berhasil diperbarui. <a href='Login-form.html'>Login di sini</a>";

} else {
    echo "Token tidak valid.";
}

$stmt->close();
$conn->close();
?>

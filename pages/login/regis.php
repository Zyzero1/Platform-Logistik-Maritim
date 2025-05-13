<?php
require 'db.php';

$name     = $_POST['name'];
$email    = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Cek apakah email sudah terdaftar
$check = $conn->prepare("SELECT id FROM users WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo "Email sudah terdaftar. Silakan login.";
} else {
    // Insert data
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $password);

    if ($stmt->execute()) {
        header("Location: Login-form.html"); // arahkan ke halaman login
        exit;
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
}
$check->close();
$conn->close();
?>

<?php
require 'db.php';

$email    = $_POST['email'];
$password = $_POST['password'];

// Ambil data user berdasarkan email
$stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 1) {
    $stmt->bind_result($id, $name, $hashedPassword);
    $stmt->fetch();

    if (password_verify($password, $hashedPassword)) {
        session_start();
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $name;

        header("Location: ../dashboard.html");
        exit;
    } else {
        echo "Password salah.";
    }
} else {
    echo "Email tidak ditemukan.";
}

$stmt->close();
$conn->close();

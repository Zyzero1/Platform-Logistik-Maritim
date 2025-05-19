<?php
$conn = new mysqli("localhost", "root", "", "lautinaja");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    
    // Cek apakah email ada
    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($result->num_rows > 0) {
        $token = bin2hex(random_bytes(16)); // Token acak
        $conn->query("UPDATE users SET reset_token='$token' WHERE email='$email'");
        
        // Simulasi kirim email (seharusnya kirim via mail server)
        $resetLink = "http://localhost/Platform-Logistik-Maritim/pages/login/update-password.php?token=$token";
        echo "<script>
            alert('Link reset dikirim. Klik OK untuk lanjut.');
            window.location.href = '$resetLink';
        </script>";
    } else {
        echo "<script>alert('Email tidak ditemukan.');history.back();</script>";
    }
}
?>

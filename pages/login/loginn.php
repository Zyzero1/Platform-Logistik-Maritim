<?php
$conn = new mysqli("localhost", "root", "", "lautinaja");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
    if (password_verify($password, $user['password'])) {
        // Login sukses
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        echo "<script>
        alert('Login berhasil!');
        window.location.href = '../dashboard.php';
    </script>";
    } else {
        echo "Password salah.";
    }
} else {
    echo "Email tidak ditemukan.";
}

$stmt->close();
$conn->close();
?>

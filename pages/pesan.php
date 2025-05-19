<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "lautinaja"; // Ganti dengan nama database kamu

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama   = $_POST['nama'];
    $email  = $_POST['email'];
    $subjek = $_POST['subjek'];
    $pesan  = $_POST['pesan'];

    $sql = "INSERT INTO pesan (nama, email, subjek, isi_pesan) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nama, $email, $subjek, $pesan);

    if ($stmt->execute()) {
        echo "<script>alert('Pesan berhasil dikirim!'); window.location.href='contact.php';</script>";
    } else {
        echo "Gagal mengirim pesan: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

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

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama      = $_POST['nama'];
    $email     = $_POST['email'];
    $alamat    = $_POST['alamat'];
    $kabupaten = $_POST['kabupaten'];
    $provinsi  = $_POST['provinsi'];
    $kodepos   = $_POST['kodepos'];
    $metode    = $_POST['metodepembayaran'];
    $barang    = $_POST['jenisbarang'];
    $kargo     = $_POST['jeniskargo'];

    $sql = "INSERT INTO pemesanan (nama, email, alamat, kabupaten, provinsi, kodepos, metode_pembayaran, jenis_barang, jenis_kargo) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $nama, $email, $alamat, $kabupaten, $provinsi, $kodepos, $metode, $barang, $kargo);

    if ($stmt->execute()) {
        echo "<script>alert('Pemesanan berhasil disimpan!'); window.location.href='pemesanan.php';</script>";
    } else {
        echo "Gagal menyimpan: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

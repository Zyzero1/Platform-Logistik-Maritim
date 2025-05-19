<?php
session_start();
$conn = new mysqli("localhost", "root", "", "lautinaja");
$user_id = $_SESSION['user_id'];

$query = $conn->query("SELECT name FROM users WHERE id = $user_id");
$user = $query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css ">
    <script src="https://kit.fontawesome.com/f4f5772ee5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="../styles/dashboard.css">
    <title>Lautin Aja Dashboard</title>
</head>
<body>
    <header>
        <img src="../img/logo.png" alt="Logo" class="logo">
        <nav>
            <ul>
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="service.php">Service</a></li>
                <li><a href="about-us.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
       <a href="profile.php">
            <button class="profile-btn">
                <img src="../img/profil-web.png" alt="Profile Picture" class="profile-icon">
                <span class="profile-name"><?= htmlspecialchars($user['name']) ?></span>
            </button>
        </a>
    </header>

    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h2>LAYANAN EKSPEDISI TANJUNG PINANG MURAH</h2>
            <div class="title-group">
                <h1 class="main-title">Selamat Datang</h1>
                <h1 class="sub-title">@username</h1>
            </div>
        </div>
    </section>

    <section class="forms-container2">
        <div class="form-box white-form2">
            <h3 class="form-title">CEK STATUS</h3>
            <div class="input-group2">
                <input type="text" placeholder="LA-XXXXXXXX">
                <button class="check-btn2"><i class="fa fa-paper-plane" aria-hidden="true"></i>CHECK</button>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="title-group2">
            <h1 class="title-1">Riwayat Pemesanan</h1>
        </div>
        <p>Terima kasih! Kami siap memastikan kiriman Anda aman, tepat waktu, dan </p> 
        <p>terjamin. berikut daftar pesanan anda bersama kami.</p>
        <div class="line-container2">
            <div class="line">
                <div class="dot"></div>
            </div>
        </div>
        <div class="order-box">
            <div class="order-icon">
                <img src="../img/motorcycle.png" alt="Motor Icon">
            </div>
            <div class="order-details">
                <h4>Pengiriman Motor</h4>
                <p>Rp. 500.000</p>
            </div>
            <div class="location-container">
                <div class="order-location">
                    <i class="fa-solid fa-location-dot"></i>
                    <div class="location-text">
                        <span class="address">Batam - Natuna</span>
                        <span class="date">12 Maret 2025</span>
                    </div>
                </div>
            </div>
            <div class="order-status">
                <span class="status-complete">Selesai</span>
            </div>
        </div>

        <div class="order-box">
            <div class="order-icon">
                <img src="../img/car.png" alt="Mobil Icon">
            </div>
            <div class="order-details">
                <h4>Pengiriman Mobil</h4>
                <p>Rp. 1.000.000</p>
            </div>
            <div class="location-container">
                <div class="order-location">
                    <i class="fa-solid fa-location-dot"></i>
                    <div class="location-text">
                        <span class="address">Lingga - Batam</span>
                        <span class="date">14 Juni 2024</span>
                    </div>
                </div>
            </div>
            <div class="order-status">
                <span class="status-complete">Selesai</span>
            </div>
        </div>

        <div class="order-box">
            <div class="order-icon">
                <img src="../img/shipping.png" alt="Cargo Laut Icon">
            </div>
            <div class="order-details">
                <h4>Cargo Laut</h4>
                <p>Rp. 100.000</p>
            </div>
            <div class="location-container">
                <div class="order-location">
                    <i class="fa-solid fa-location-dot"></i>
                    <div class="location-text">
                        <span class="address">Batam - Tanjung Pinang</span>
                        <span class="date">10 Mei 2024</span>
                    </div>
                </div>
            </div>
            <div class="order-status">
                <span class="status-complete">Selesai</span>
            </div>
        </div>   

    </section>

    <footer>
        <p>2025 © Lautin Aja. All Rights Reserved.</p>
    </footer>
</body>
</html>
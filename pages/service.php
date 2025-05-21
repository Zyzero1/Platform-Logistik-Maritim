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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css ">
    <script src="https://kit.fontawesome.com/f4f5772ee5.js" crossorigin="anonymous"></script>
    <title>Lautin Aja Service</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            width: 100%;
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        header {
            position: sticky;
            width: 100%;
            top: 0;
            display: flex;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            justify-content: space-between;
            align-items: center;
            padding: 5px 20px;
            background: white;
            color: rgb(15, 15, 15);
            z-index: 1000;
        }

        .logo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            object-fit: cover;
            transform: translateX(15%);
        }

        nav {
            display: flex;
            justify-content: flex-end;
            flex-grow: 1;
            margin-right: 40px;
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav li {
            margin-left: 0px;
        }

        .nav-link {
            font-size: 18px;
            color: #091E3E;
            text-decoration: none;
            font-family: 'Nunito', sans-serif;
            font-weight: bold;
        }

        .nav-link:hover {
            color: #008CD8;
        }

        .profile-icon {
            width: 39px;
            height: 39px;
            border-radius: 50%;
            margin-right: 20px;
            object-fit: cover;
        }

        .profile-name {
            font-family: 'Nunito', sans-serif;
            font-weight: bold;
            font-size: 18px;
        }

        .dropdown-toggle {
            background-color: #ffffff !important;
            color: #091E3E !important;
            border: none !important;
            box-shadow: none !important;
            padding: 8px 12px;
            display: flex;
            align-items: center;
        }

        .dropdown-toggle:hover {
            background-color: #f1f1f1 !important;
        }

        .dropdown-item {
            color: #212529 !important;
            display: flex;
            align-items: center;
            font-family: 'Nunito', sans-serif;
            transition: background-color 0.3s, color 0.3s;
        }

        .dropdown-item .fa-user,
        .dropdown-item .fa-right-from-bracket {
            margin-right: 14px;
        }

        /* Gaya ketika item diklik / aktif */
        .dropdown-item.active,
        .dropdown-item:active {
            background-color: #015ec8 !important;
            color: white !important;
        }

        .dropdown-item:hover {
            background-color: #f1f1f1;
        }

        /* Hero Section */
        .hero {
            position: relative;
            min-height: 550px;
            background: url('https://via.placeholder.com/1440x500') center/cover no-repeat;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            z-index: 1;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 580px;
            background: #006DB6;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: left;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 40px 20px;
        }

        .text-section h1 {
            font-size: 80px;
            margin-bottom: 20px;
            margin-top: -60px;
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            line-height: 1;
        }

        .text-section p {
            font-size: 24px;
            margin: 0 0;
            font-family: 'Nunito', sans-serif;
        }

        .service-picture {
            width: 1012px;
            height: auto;
            max-width: 100%;
            object-fit: contain;
            margin-top: 40px;
        }

        /* Services Section */
        .services {
            max-width: 1200px;
            margin: 60px auto;
            text-align: center;
        }

        .title-group2 {
            text-align: center;
        }

        .title-group2 .title-1 {
            font-size: 2.5rem;
            font-family: 'Nunito', sans-serif;
            font-weight: 800;
            margin-top: -15px;
            color: #091E3E;
        }

        .title-group2 .title-2 {
            font-size: 2.5rem;
            font-family: 'Nunito', sans-serif;
            font-weight: 800;
            color: #091E3E;
            margin-top: -15px;
        }

        .line-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        .line {
            position: relative;
            width: 150px;
            height: 5px;
            border-radius: 10px;
            background-color: #06A3DA;
            overflow: hidden;
        }

        .dot {
            position: absolute;
            top: 50%;
            left: 0;
            width: 6px;
            height: 6px;
            background-color: white;
            border-radius: 30%;
            transform: translate(-50%, -50%);
            animation: move-dot 3s linear infinite alternate;
        }

        @keyframes move-dot {
            0% {
                left: 0;
            }

            100% {
                left: 100%;
            }
        }

        .services p {
            font-family: 'Rubik', sans-serif;
            color: #6B6A75;
            max-width: 800px;
            margin: 0 auto 0px;
        }

        .service-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 60px;
            margin-top: 40px;
        }

        .service-card {
            background: #e6f7ff;
            width: 350px;
            height: 300px;
            padding: 30px;
            text-align: center;
        }

        .service-icon {
            width: 60px;
            height: 60px;
            margin: 20px auto 20px;
            background: #06A3DA;
            border-radius: 2px;
            transform: rotate(45deg);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .vehicle-icon {
            width: 36px;
            height: 36px;
            transform: rotate(-45deg);
            filter: brightness(0) invert(1);
        }

        .service-title {
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        .service-desc {
            font-size: 0.9rem;
            color: #666;
        }

        /* Floating Action Button */
        .floating-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            background-color: #06A3DA;
            color: white;
            font-size: 40px;
            font-weight: bold;
            text-align: center;
            line-height: 60px;
            border-radius: 50%;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
            z-index: 999;
        }

        .floating-button:hover {
            background-color: #0077b6;
        }

        /* Footer */
        footer {
            background: #001f3f;
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: 160px;
        }

        footer p {
            margin: 0;
            font-family: 'Rubik', sans-serif;
            font-size: 16px;
        }

        @media (max-width: 768px) {
            .forms-container {
                flex-direction: column;
            }

            .form-box {
                margin: 10px 0;
            }
        }
    </style>
</head>

<body>
    <header class="d-flex align-items-center justify-content-between px-3 py-2">
        <img src="../img/logo.png" alt="Logo" class="logo">
        <nav class="flex-grow-1 text-center">
            <ul class="nav justify-content-center mb-0">
                <li class="nav-item"><a class="nav-link" href="dashboard.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="service.php">Service</a></li>
                <li class="nav-item"><a class="nav-link" href="about-us.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <!-- Dropdown Menu -->
        <div class="dropdown-center">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../img/profil-web.png" alt="Profile Picture" class="profile-icon me-2">
                <span class="profile-name"><?= htmlspecialchars($user['name']) ?></span>
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="profile.php">
                        <i class="fa-solid fa-user"></i> Account
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="login/Login-form.php">
                        <i class="fa-solid fa-right-from-bracket"></i> Log out
                    </a>
                </li>
            </ul>
        </div>
    </header>

    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
            <div class="text-section" style="flex: 1; min-width: 300px; text-align: left; transform: translateX(20%);">
                <h1>Service</h1>
                <p>Amanah dalam layanan,</p>
                <p>cepat dalam pengiriman,</p>
                <p>terpercaya setiap saat.</p>
            </div>
            <div class="image-section" style="flex: 1; min-width: 300px; display: flex; justify-content: flex-end;">
                <img src="../img/service.png" alt="Service Picture" class="service-picture">
            </div>
        </div>
    </section>

    <section class="services">
        <div class="title-group2">
            <h1 class="title-1">Layanan Cargo dan Ekspedisi Murah</h1>
            <h1 class="title-2">Indonesia</h1>
        </div>
        <p>Kami akan support anda dengan sepenuh hati, dengan memiliki tim yang handal</p>
        <p>akan menangani setiap barang kiriman yang ada, supaya pengiriman tepat </p>
        <p>waktu, aman, terjamin serta bisa terealisasi dengan baik pastinya.</p>
        <div class="line-container">
            <div class="line">
                <div class="dot"></div>
            </div>
        </div>

        <div class="service-cards">
            <div class="service-card">
                <div class="service-icon">
                    <img src="../img/shipping.png" alt="vehicle Icon" class="vehicle-icon">
                </div>
                <h4 class="service-title">Cargo Laut</h4>
                <p class="service-desc">Kirim barang cepat & aman via kapal laut dengan rute pengiriman luas menjangkau seluruh indonesia</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <img src="../img/moving-truck.png" alt="vehicle Icon" class="vehicle-icon">
                </div>
                <h4 class="service-title">Pengiriman Barang</h4>
                <p class="service-desc">Kemudahan kirim barang ke seluruh indonesia dengan ongkos kirim paling murah</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <img src="../img/car.png" alt="vehicle Icon" class="vehicle-icon">
                </div>
                <h4 class="service-title">Pengiriman Mobil</h4>
                <p class="service-desc">Kirim mobil ke seluruh wilayah indonesia tanpa rasa khawatir</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <img src="../img/excavators.png" alt="vehicle Icon" class="vehicle-icon">
                </div>
                <h4 class="service-title">Pengiriman Alat Berat</h4>
                <p class="service-desc">Kirim alat berat Excavator, Dump, truk dan lainnya ke berbagai daerah di indonesia</p>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <img src="../img/motorcycle.png" alt="vehicle Icon" class="vehicle-icon">
                </div>
                <h4 class="service-title">Pengiriman Motor</h4>
                <p class="service-desc">Pengiriman motor dengan ongkos kirim paling murah, aman dan cepat</p>
            </div>
            <!-- Repeat similar structure for other services -->
        </div>
    </section>

    <a href="pemesanan.php" class="floating-button" title="Menu Pemesanan">+</a>

    <footer>
        <p>2025 © Lautin Aja. All Rights Reserved.</p>
    </footer>

    <script src="../scripts/script.js"></script>
</body>

</html>
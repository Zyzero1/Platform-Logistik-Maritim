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
    <title>Lautin Aja Pemesanan</title>
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

        .contact-picture {
            width: 696px;
            height: auto;
            max-width: 100%;
            object-fit: contain;
            margin-top: -60px;
            transform: translateX(-25px);
        }

        .text-section {
            min-width: 500px;
            text-align: left;
        }

        .text-section h1 {
            width: 800px;
            font-size: 68px;
            margin-bottom: 20px;
            margin-top: -85px;
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            line-height: 1.2;
            transform: translateX(-18.2%);
        }

        .text-section p {
            font-size: 24px;
            line-height: 1.25;
            margin: 0 0;
            font-family: 'Nunito', sans-serif;
            transform: translateX(-20.6%);
        }

        /* Services Section */
        .services {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .title-group2 {
            text-align: center;
            margin-top: 30px;
        }

        .title-group2 .title-1 {
            font-size: 2.5rem;
            font-family: 'Nunito', sans-serif;
            font-weight: 800;
            margin-top: -15px;
            color: #091E3E;
        }

        .services p {
            font-family: 'Rubik', sans-serif;
            color: #6B6A75;
            max-width: 800px;
            margin: 0 auto 0px;
        }

        .container {
            display: flex;
            gap: 40px;
            margin: 40px auto;
            max-width: 970px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }

        .contact-form {
            flex: 1;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 36px;
        }

        .form-group {
            display: flex;
            gap: 16px;
        }

        .form-group input {
            flex: 1;
            min-width: 0;
        }

        input,
        textarea {
            padding: 12px;
            border: 1px solid #A3E7FF;
            border-radius: 16px;
            background-color: #C0EDFC;
            font-size: 16px;
            font-family: 'Rubik', sans-serif;
            width: 100%;
        }

        input[type="text"],
        input[type="email"] {
            height: 72px;
        }

        textarea {
            resize: vertical;
            min-height: 150px;
            width: 552px;
        }

        .btn-kirim {
            padding: 17px 24px;
            width: 20%;
            margin: auto;
            background-color: #06A3DA;
            font-family: 'Rubik', sans-serif;
            color: #fff;
            border: none;
            border-radius: 15px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-kirim:hover {
            background-color: #058fc1;
        }

        .contact-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 54px;
            margin-left: 90px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 16px;
            text-align: left;
        }

        .icon-wrapper {
            width: 48px;
            height: 48px;
            background-color: #06A3DA;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
        }

        .icon-wrapper i {
            font-size: 24px;
        }

        .info-item .info-title {
            color: #06A3DA;
        }

        .info-title,
        .info-detail {
            font-family: 'Rubik', sans-serif;
        }

        .info-detail {
            font-size: 16px;
            color: #6B6A75;
            width: 180px;
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

        @media (max-width: 600px) {
            .form-group {
                flex-direction: column;
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
            <div class="image-section" style="flex: 1; min-width: 300px; display: flex; justify-content: flex-end;">
                <img src="../img/contact.png" alt="Contact Picture" class="contact-picture">
            </div>
            <div class="text-section" style="flex: 1; min-width: 300px; text-align: left; transform: translateX(20%);">
                <h1>Kami Siap Dengar & Bantu Kamu!</h1>
                <p>Hubungi kami untuk informasi layanan, harga, atau</p>
                <p>kebutuhan khusus pengirimanmu.</p>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="title-group2">
            <h1 class="title-1">Contact</h1>
        </div>
        <p>Kami akan support anda dengan sepenuh hati. hubungi kami</p>
        <p>untuk mendapat penawaran terbaik dari kami.</p>

        <div class="container">
            <div class="contact-form">
                <form action="pesan.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="nama" placeholder="Your Name" required>
                        <input type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="subjek" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                        <textarea name="pesan" placeholder="Message" required></textarea>
                    </div>
                    <button type="submit" class="btn-kirim">Kirim</button>
                </form>

            </div>
            <div class="contact-info">
                <div class="info-item">
                    <div>
                        <p class="info-title">Telepon / WhatsApp</p>
                        <p class="info-detail">+628217669999</p>
                    </div>
                    <div class="icon-wrapper">
                        <i class="fa-solid fa-phone-volume"></i>
                    </div>
                </div>
                <div class="info-item">
                    <div>
                        <p class="info-title">Jam Kerja</p>
                        <p class="info-detail">Mulai jam 08:00 - 18:00</p>
                    </div>
                    <div class="icon-wrapper">
                        <i class="fa-regular fa-clock"></i>
                    </div>
                </div>
                <div class="info-item">
                    <div>
                        <p class="info-title">Email</p>
                        <p class="info-detail">lautinaja.co.id</p>
                    </div>
                    <div class="icon-wrapper">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                </div>
                <div class="info-item">
                    <div>
                        <p class="info-title">Alamat</p>
                        <p class="info-detail">Jl. Kampung Bugis, Tanjung Pinang Kota</p>
                    </div>
                    <div class="icon-wrapper">
                        <i class="fa-solid fa-map-location-dot"></i>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <footer>
        <p>2025 © Lautin Aja. All Rights Reserved.</p>
    </footer>

    <script src="../scripts/script.js"></script>
</body>

</html>
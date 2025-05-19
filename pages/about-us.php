<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <title>About Us</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        header {
            position: sticky;
            top: 0;
            width: 100%;
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
            margin-left: 30px;
        }

        nav a {
            color: #091E3E;
            text-decoration: none;
            font-family: 'Nunito', sans-serif;
            font-size: 18px;
            font-weight: bold;
        }

        .profile-btn {
            background: none;
            color: rgb(8, 8, 71);
            border: none;
            border-radius: 20px;
            padding: 5px 15px;
            display: flex;
            align-items: center;
            cursor: pointer;
            margin-left: 20px;
        }

        .profile-icon {
            width: 39px;
            height: 39px;
            border-radius: 50%; 
            margin-right: 20px; 
        }

        .profile-name {
            font-family: 'Nunito', sans-serif;
            font-weight: bold;
            font-size: 18px;
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

        .text-section {
            flex: 1;
            min-width: 300px;
            position: relative;
            z-index: 1;
            display: flex;
        }

        .text-section h1 {
            font-size: 68px;
            margin-top: -35%;
            padding: 0;
            line-height: 1.2; 
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            transform: translateX(-53.2%);
            white-space: nowrap;
            min-width: max-content;
        }

        .about-us-picture {
            width: 1012px;
            height: auto;
            max-width: 100%;
            object-fit: contain;
            margin-top: -57px;
            transform: rotate(4.18deg);
            margin-left: 20px;
        }

        /* Services Section */
        .services {
            max-width: 1200px;
            margin: 60px auto;
            text-align: center;
        }

        .title-group2 {
            margin-top: -40px; 
            text-align: left; 
            transform: translateX(3%);
        }

        .title-group2 .title-1 {
            font-size: 20px; 
            font-family: 'Nunito', sans-serif; 
            font-weight: 800; 
            color: #06A3DA;
        }

        .title-group2 .title-2 {
            font-size: 2.5rem; 
            font-family: 'Nunito', sans-serif; 
            font-weight: 800; 
            color: #091E3E;
            /* margin-top: -15px; */
        }

        .line-container {
            display: flex;
            align-items: start;
            margin-bottom: 50px; 
            margin-top: -7px;
        }

        .line {
            position: relative;
            width: 196px; 
            height: 5px; 
            border-radius: 10px;
            background-color: #06A3DA; 
            overflow: hidden;
        }

        .title-group2 p {
            font-family: 'Rubik', sans-serif; 
            color: #6B6A75;
            max-width: 800px;
            margin: 0 auto 0px;
        }

        .logo-picture {
            max-width: 100%;
            object-fit: contain;
            transform: translateX(-20%) translateY(30%);
        }

        .button {
            display: flex;
            justify-content: flex-start;
            transform: translateX(3%);
            align-items: center;
        }

        .contact-btn {
            width: 215px;
            height: 58px;
            background: #06A3DA;
            color: white;
            margin-top: 30px;
            padding: 15px 40px;
            border: none;
            border-radius: 50px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Nunito', sans-serif;
            font-weight: 600;
        }

        .contact-btn:hover {
            background: #0793c6;
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
        <button class="profile-btn">
            <img src="../img/profil-web.png" alt="Profile Picture" class="profile-icon">
            <span class="profile-name">Profil</span>
        </button>
    </header>

    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap;">
            <div class="image-section" style="flex: 1; min-width: 1000px; display: flex; justify-content: flex-end;">
                <img src="../img/container.PNG" alt="Service Picture" class="about-us-picture">
            </div>
            <div class="text-section">
                <h1>PT. KECIL-KECILAN</h1>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="title-group2" style="display: flex; align-items: flex-start; justify-content: space-between;">
            <div>
                <h1 class="title-1">TENTANG KAMI</h1>
                <h1 class="title-2">Lautin Aja</h1>
                <div class="line-container">
                    <div class="line"></div>
                </div>
                <p>Perusahaan yang bergerak dibidang logistik jasa pengiriman dan pindahan kantor. Dibawah</p> 
                <p>bendera <strong>PT. Kecil Kecilan</strong>, Kami berusaha memberikan harga yang kompetitif, </p>
                <p>responsif, komunikatif, dan selalu meningkatkan pelayanan kepada customer.</p>
                <p style="margin-top: 40px;"><strong>Lautin Aja</strong> memiliki banyak sekali cakupan wilayah tertentu di Indonesia. Layanan yang kami.</p>
                <p>berikan yaitu jasa pengiriman, Jasa pengiriman barang, cargo laut, pengiriman mobil dan motor,</p>
                <p>pengiriman alat berat, serta proyek pengiriman atau borongan.</p>
                <p style="margin-top: 40px;">Kami siap menjadi mitra pengiriman dengan komunikasi yang baik, harga yang bersaing dan</p>
                <p>komitmen yang selalu kami jaga.</p>
            </div>
            <div class="image-section">
                <img src="../img/logo.png" alt="Logo Picture" class="logo-picture" style="width: 300px; height: auto;">
            </div>
        </div>
        <div class="button">
            <button class="contact-btn">CONTACT</button>
        </div>
    </section>

    <footer>
        <p>2025 © Lautin Aja. All Rights Reserved.</p>
    </footer>
</body>
</html>
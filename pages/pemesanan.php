<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <title>Lautin Aja Pemesanan</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

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
        
        .booking-picture {
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
            margin-top: -120px;
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            line-height: 1.2;
            transform: translateX(-28.2%);
        }

        .text-section p {
            font-size: 24px;
            line-height: 1.25;
            margin: 0 0;
            font-family: 'Nunito', sans-serif;
            transform: translateX(-32.2%);
        }

        /* Services Section */
        .services {
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
        }

        .title-group2 {
            text-align: center; 
            margin-top: -60px;
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
            background-color: #10AEE5; 
            border-radius: 15px;
            padding: 30px;
            width: 948px;
            margin: 40px auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px; 
            max-width: 900px;
            margin: 0 auto;
            font-family: 'Nunito', sans-serif;
        }

        .form-group {
            display: flex;
            align-items: center;
            gap: 20px; 
        }

        .form-group label {
            min-width: 180px; 
            font-weight: bold;
            text-align: left;
        }

        .form-group input {
            flex: 1;
            padding: 8px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        label {
            color: #fff;
            font-size: 20px;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            height: 49px;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 16px;
            font-family: 'Nunito', sans-serif;
        }

        .row {
            display: flex;
            gap: 20px;
            width: 685px;
            margin-left: auto; 
        }

        .col {
            flex: 1;         
        }

        .btn-kirim {
            background-color: #fff;
            color: #00b4d8;
            border: none;
            width: 120px;
            margin-left: auto;
            padding: 13px 20px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            font-family: 'Nunito', sans-serif;
            transition: background-color 0.3s ease;
        }

        .btn-kirim:hover {
            background-color: #0096c7;
            color: #fff;
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
                <li><a href="dashboard.html">Home</a></li>
                <li><a href="#">Service</a></li>
                <li><a href="about-us.html">About Us</a></li>
                <li><a href="#">Contact</a></li>
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
            <div class="image-section" style="flex: 1; min-width: 300px; display: flex; justify-content: flex-end;">
                <img src="../img/booking.png" alt="Booking Picture" class="booking-picture">
            </div>
            <div class="text-section" style="flex: 1; min-width: 300px; text-align: left; transform: translateX(20%);">
                <h1>Yuk, Kirim Barangmu <span>Bareng LautinAja!</span></h1>
                <p>Mudah, cepat, dan aman sampai tujuan. Pesan sekarang</p>
                <p>dan nikmati layanan pengiriman maritim terpercaya</p>
                <p>kami!</p>
            </div>
        </div>
    </section>

    <section class="services">
        <div class="title-group2">
            <h1 class="title-1">Pemesanan</h1>
        </div>
        <p>Kami siap mengantarkan barang Anda dengan jaminan keamanan dan</p> 
        <p>ketepatan waktu. Isi detail pengiriman dan pesan sekarang!</p>

        <div class="container">
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="nama">Nama Anda</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Anda">
                </div>

                <div class="form-group">
                    <label for="email">Email / No Telepon</label>
                    <input type="text" id="email" name="email" placeholder="Masukkan Email atau No Telepon"> 
                </div>
                
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat" placeholder="Masukkan Alamat Lengkap">
                </div>

                <div class="row">
                    <div class="col">
                        <label for="kabupaten">Kabupaten / Kota</label>
                        <select id="kabupaten" name="kabupaten">
                            <option value="">Pilih Kabupaten/Kota</option>
                            <option value="Jakarta Utara">Jakarta Utara</option>
                            <option value="Jakarta Selatan">Jakarta Selatan</option>
                            <option value="Jakarta Barat">Jakarta Barat</option>
                            <option value="Jakarta Timur">Jakarta Timur</option>
                            <option value="Jakarta Pusat">Jakarta Pusat</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="provinsi">Provinsi</label>
                        <select id="provinsi" name="provinsi">
                            <option value="">Pilih Provinsi</option>
                            <option value="DKI Jakarta">DKI Jakarta</option>
                            <option value="Jawa Barat">Jawa Barat</option>
                            <option value="Jawa Tengah">Jawa Tengah</option>
                            <option value="Jawa Timur">Jawa Timur</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="kodepos">Kode Pos</label>
                        <input type="text" id="kodepos" name="kodepos" placeholder="Masukkan Kode Pos">
                    </div>
                    <div class="col">
                        <label for="metodepembayaran">Metode Pembayaran</label>
                        <select id="metodepembayaran" name="metodepembayaran">
                            <option value="">Pilih Metode Pembayaran</option>
                            <option value="transfer_bank">Transfer Bank</option>
                            <option value="gopay">Gopay</option>
                            <option value="ovo">OVO</option>
                            <option value="shopeepay">ShopeePay</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="jenisbarang">Jenis Barang</label>
                        <select id="jenisbarang" name="jenisbarang">
                            <option value="">Pilih Jenis Barang</option>
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                            <option value="elektronik">Elektronik</option>
                            <option value="pakaian">Pakaian</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="jeniskargo">Jenis Kargo</label>
                        <select id="jeniskargo" name="jeniskargo">
                            <option value="">Pilih Jenis Kargo</option>
                            <option value="reguler">Reguler</option>
                            <option value="express">Express</option>
                            <option value="same_day">Same Day</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn-kirim">Kirim</button>
            </form>
        </div>
   
    </section>

    <footer>
        <p>2025 © Lautin Aja. All Rights Reserved.</p>
    </footer>
</body>
</html>
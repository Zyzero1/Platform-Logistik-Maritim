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

        .profile-container {
            background-color: #10AEE5;
            padding: 20px;
            margin: 60px auto;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 900px;
            height: 450px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-header {
            color: #ffffff;
            font-family: 'Nunito', sans-serif;
            font-size: 24px;
            font-weight: bold;
            transform: translateX(-8px);
            margin-bottom: 20px;
        }

        .profile-row {
            display: flex;
            gap: 50px;
            align-items: flex-end;
            margin-bottom: 20px;
        }

        .left-column {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .user-icon {
            position: relative;
            width: 200px;
            height: 200px;
            background-color: #ffffff;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 20px;
            overflow: hidden;
        }

        .user-icon img {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            object-fit: cover;
        }

        .user-icon i {
            font-size: 30px;
            color: #888;
        }

        .edit-overlay-icon {
            position: absolute;
            bottom: 10px;
            right: 7px;
            font-size: 14px;
            color: #007bff;
            border-radius: 50%;
            padding: 2px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .edit-overlay-icon:hover {
            color: #0056b3;
        }

        .form-fields {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 200px;
        }

        .profile-section {
            display: flex;
            align-items: center;
            margin-bottom: 35px;
            gap: 30px;
            width: 100%;
        }

        .profile-section label {
            color: #ffffff;
            text-align: right;
            font-family: 'Nunito', sans-serif;
            width: 100px;
            font-weight: bold;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
            flex-grow: 1;
        }

        .input-wrapper input {
            padding-right: 30px;
            width: 400px;
            padding: 15px;
            margin-left: auto;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .edit-icon {
            position: absolute;
            right: 10px;
            cursor: pointer;
            font-size: 14px;
        }

        .button-wrapper {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        .update-button {
            padding: 15px 16px;
            font-family: 'Nunito', sans-serif;
            width: 100px;
            background-color: #ffffff;
            color: #10AEE5;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            transform: translateX(65px);
            transition: background-color 0.3s ease;
        }

        .update-button:hover {
            background-color: #1568bb;
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

    <div class="profile-container">
        <div class="profile-row">

            <div class="left-column">
                <h2 class="profile-header">Profil</h2>
                <div class="user-icon" id="editIconContainer">
                    <img id="profile-pic" src="../img/user.png" alt="user-icon">
                    <i class="fa-solid fa-pen-to-square edit-overlay-icon" onclick="document.getElementById('fileInput').click();"></i>
                </div>
                <input type="file" id="fileInput" accept="image/*" style="display: none;" onchange="handleImageUpload(event)">
            </div>

            <div class="form-fields">
                <div class="profile-section">
                    <label for="name">Name</label>
                    <div class="input-wrapper">
                        <input type="text" id="name" placeholder="..." />
                        <i class="fa-solid fa-pen-to-square edit-icon"></i>
                    </div>
                </div>

                <div class="profile-section">
                    <label for="email">Email</label>
                    <div class="input-wrapper">
                        <input type="email" id="email" placeholder="..." />
                        <i class="fa-solid fa-pen-to-square edit-icon"></i>
                    </div>
                </div>

                <div class="profile-section">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <input type="password" id="password" placeholder="..." />
                        <i class="fa-solid fa-pen-to-square edit-icon"></i>
                    </div>
                </div>
                <div class="button-wrapper">
                    <button class="update-button">Update</button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>2025 © Lautin Aja. All Rights Reserved.</p>
    </footer>

    <script>
        function handleImageUpload(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Ganti src gambar profil dengan gambar baru
                    document.getElementById('profile-pic').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>

</html>
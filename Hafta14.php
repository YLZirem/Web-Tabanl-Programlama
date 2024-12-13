<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kişi İşlemleri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input {
            padding: 8px;
            width: 100%;
            margin-bottom: 10px;
        }
        button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Kişi İşlemleri</h1>

    <!-- Form 1: Veri Ekleme -->
    <form method="post" action="">
        <h2>Kişi Ekle</h2>
        <label for="ad">Ad:</label>
        <input type="text" id="ad" name="ad" required>
        <label for="soyad">Soyad:</label>
        <input type="text" id="soyad" name="soyad" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit" name="ekle">Ekle</button>
    </form>

    <!-- Form 2: Veri Arama -->
    <form method="post" action="">
        <h2>Kişi Bul</h2>
        <label for="arama_ad">Ad:</label>
        <input type="text" id="arama_ad" name="arama_ad" required>
        <button type="submit" name="bul">Bul</button>
    </form>

    <?php
    // Veritabanı bağlantısı
    $conn = new mysqli("localhost", "root", "", "testdb");

    if ($conn->connect_error) {
        die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
    }

    // Form 1: Veri ekleme
    if (isset($_POST['ekle'])) {
        $ad = $conn->real_escape_string($_POST['ad']);
        $soyad = $conn->real_escape_string($_POST['soyad']);
        $email = $conn->real_escape_string($_POST['email']);

        // 'kisiler' tablosu ve sütun isimlerine uygun SQL sorgusu
        $sql = "INSERT INTO kisiler (Ad, SoyAd, Email) VALUES ('$ad', '$soyad', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color: green;'>Kişi başarıyla eklendi!</p>";
        } else {
            echo "<p style='color: red;'>Hata: " . $conn->error . "</p>";
        }
    }

    // Form 2: Veri arama
    if (isset($_POST['bul'])) {
        $arama_ad = $conn->real_escape_string($_POST['arama_ad']);
        $sql = "SELECT SoyAd, Email FROM kisiler WHERE Ad = '$arama_ad'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>Soyad: " . $row['SoyAd'] . " | Email: " . $row['Email'] . "</p>";
            }
        } else {
            echo "<p style='color: red;'>Hiçbir sonuç bulunamadı.</p>";
        }
    }

    $conn->close();
    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form İşlemleri</title>
</head>
<body>
    <h1>Veritabanı İşlemleri</h1>

    <!-- 1. Form: Veri Ekleme -->
    <form method="post" action="">
        <h2>Kişi Ekle</h2>
        <label for="ad">Ad:</label>
        <input type="text" id="ad" name="ad" required>
        <br>
        <label for="soyad">Soyad:</label>
        <input type="text" id="soyad" name="soyad" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        <button type="submit" name="ekle">Ekle</button>
    </form>

    <!-- 2. Form: Veri Arama -->
    <form method="post" action="">
        <h2>Kişi Bul</h2>
        <label for="arama_ad">Ad:</label>
        <input type="text" id="arama_ad" name="arama_ad" required>
        <br><br>
        <button type="submit" name="bul">Bul</button>
    </form>

    <?php
    // Veritabanı bağlantısı
    $conn = new mysqli("localhost", "root", "", "test");

    if ($conn->connect_error) {
        die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
    }

    // 1. Form işlemleri: Veri ekleme
    if (isset($_POST['ekle'])) {
        $ad = $conn->real_escape_string($_POST['ad']);
        $soyad = $conn->real_escape_string($_POST['soyad']);
        $email = $conn->real_escape_string($_POST['email']);

        $sql = "INSERT INTO kisi (ad, soyad, email) VALUES ('$ad', '$soyad', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Kişi başarıyla eklendi!</p>";
        } else {
            echo "<p>Hata: " . $conn->error . "</p>";
        }
    }

    // 2. Form işlemleri: Veri arama
    if (isset($_POST['bul'])) {
        $arama_ad = $conn->real_escape_string($_POST['arama_ad']);

        $sql = "SELECT soyad, email FROM kisi WHERE ad = '$arama_ad'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>Soyad: " . $row['soyad'] . " | Email: " . $row['email'] . "</p>";
            }
        } else {
            echo "<p>Hiçbir sonuç bulunamadı.</p>";
        }
    }

    $conn->close();
    ?>
</body>
</html>


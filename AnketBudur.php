<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Veritabanı bağlantı ayarları
$servername = "localhost"; // Sunucu adı
$username = "root"; // PHPMyAdmin kullanıcı adı
$password = ""; // PHPMyAdmin şifre
$dbname = "anket"; // Veritabanı adı

// Veritabanına bağlan
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// Oylar tablosundan verileri al
$sql = "SELECT evet, hayir FROM oylar WHERE id = 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $evet = $row['evet'];
    $hayir = $row['hayir'];
} else {
    // Eğer id=1 satırı yoksa başlangıç değerlerini sıfırla
    $evet = 0;
    $hayir = 0;
}

// Oy kullanıldığında veritabanını güncelle
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vote = $_POST['vote'];
    if ($vote === 'evet') {
        $evet++;
        $conn->query("UPDATE oylar SET evet = $evet WHERE id = 1");
    } elseif ($vote === 'hayir') {
        $hayir++;
        $conn->query("UPDATE oylar SET hayir = $hayir WHERE id = 1");
    }
}

// Toplam oyları hesapla
$totalVotes = $evet + $hayir;
$evetPercentage = $totalVotes > 0 ? ($evet / $totalVotes) * 100 : 0;
$hayirPercentage = $totalVotes > 0 ? ($hayir / $totalVotes) * 100 : 0;

$conn->close();
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #6200ea;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 30px auto;
            background-color: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
        }

        h1,
        h2 {
            color: #333;
            text-align: center;
        }

        form {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        button {
            background-color: #6200ea;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #3700b3;
        }

        .results {
            margin-top: 20px;
            text-align: center;
        }

        .progress-bar {
            display: flex;
            height: 20px;
            margin-top: 10px;
            background-color: #ddd;
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-evet {
            background-color: #6200ea;
            width: <?= $evetPercentage ?>%;
            transition: width 0.3s;
        }

        .progress-hayir {
            background-color: #ff5252;
            width: <?= $hayirPercentage ?>%;
            transition: width 0.3s;
        }

        footer {
            text-align: center;
            padding: 10px;
            margin-top: 20px;
            background-color: #f7f7f7;
            color: #6200ea;
        }
    </style>
</head>

<body>
    <header>
        <h1>Anket: PHP Dilini Seviyor Musunuz?</h1>
    </header>
    <div class="container">
        <h2>Cevap Verin</h2>
        <form method="POST">
            <button type="submit" name="vote" value="evet">Evet</button>
            <button type="submit" name="vote" value="hayir">Hayır</button>
        </form>

        <div class="results">
            <h2>Sonuçlar:</h2>
            <p>Evet: %<?= number_format($evetPercentage, 2) ?> (<?= $evet ?> oy)</p>
            <p>Hayır: %<?= number_format($hayirPercentage, 2) ?> (<?= $hayir ?> oy)</p>

            <div class="progress-bar">
                <div class="progress-evet"></div>
                <div class="progress-hayir"></div>
            </div>
        </div>
    </div>
    <footer>
        &copy; 2024 Anket Sistemi
    </footer>
</body>

</html>

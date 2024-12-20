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
$row = $result->fetch_assoc();

$evet = $row['evet'];
$hayir = $row['hayir'];

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
</head>
<body>
    <h1>Bu soruya cevap verin: PHP dilini seviyor musunuz?</h1>

    <form method="POST">
        <button type="submit" name="vote" value="evet">Evet</button>
        <button type="submit" name="vote" value="hayir">Hayır</button>
    </form>

    <h2>Sonuçlar:</h2>
    <p>Evet: %<?= number_format($evetPercentage, 2) ?> (<?= $evet ?> oy)</p>
    <p>Hayır: %<?= number_format($hayirPercentage, 2) ?> (<?= $hayir ?> oy)</p>
</body>
</html>

<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anket_veritabani";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form gönderildiğinde oy kaydetme
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $secenek_id = $_POST['secenek'];
    $language = $_POST['language'];  // Dil bilgisini alıyoruz

    // Oy sayısını artırma ve dil bilgisini kaydetme
    $sql = "UPDATE anket_sonuc SET oy_sayisi = oy_sayisi + 1, language = '$language' WHERE id = $secenek_id";
    if ($conn->query($sql) === TRUE) {
        echo "Oyunuz kaydedildi!";
    } else {
        echo "Hata: " . $conn->error;
    }
}

// Anket seçeneklerini çekme
$sql = "SELECT * FROM anket_sonuc";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Anket</title>
</head>
<body>
    <h2>Anket: En sevdiğiniz renk nedir?</h2>
    <form method="POST">
        <?php while($row = $result->fetch_assoc()) { ?>
            <input type="radio" name="secenek" value="<?= $row['id'] ?>" id="secenek<?= $row['id'] ?>" required>
            <label for="secenek<?= $row['id'] ?>"><?= $row['secenek'] ?></label><br>
        <?php } ?>
        <label for="language">Dil Seçiniz:</label>
        <select name="language" required>
            <option value="tr">Türkçe</option>
            <option value="en">English</option>
            <!-- Diğer diller buraya eklenebilir -->
        </select><br>
        <input type="submit" value="Oy Ver">
    </form>

    <h3>Sonuçlar</h3>
    <table border="1">
        <tr>
            <th>Seçenek</th>
            <th>Oy Sayısı</th>
            <th>Yüzde</th>
            <th>Dil</th>
            <th>Zaman</th>
        </tr>
        <?php
        // Sonuçları yüzdelik olarak hesaplama
        $totalVotesResult = $conn->query("SELECT SUM(oy_sayisi) AS toplam_oy FROM anket_sonuc");
        $totalVotesRow = $totalVotesResult->fetch_assoc();
        $totalVotes = $totalVotesRow['toplam_oy'];

        $result->data_seek(0);  // Veritabanını baştan oku
        while($row = $result->fetch_assoc()) {
            $percentage = ($totalVotes > 0) ? ($row['oy_sayisi'] / $totalVotes) * 100 : 0;
            echo "<tr>
                    <td>{$row['secenek']}</td>
                    <td>{$row['oy_sayisi']}</td>
                    <td>" . number_format($percentage, 2) . "%</td>
                    <td>{$row['language']}</td>
                    <td>{$row['timestamp']}</td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>

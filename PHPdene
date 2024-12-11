<?php
// Dosya yolu
$dosya = "veriler.txt";

// Mesaj ve durum için değişkenler
$mesaj = "";

// 1. Buton: Mesaj kaydet
if (isset($_POST['kaydet'])) {
    $mesaj = isset($_POST['mesaj']) ? $_POST['mesaj'] : '';
    if (!empty($mesaj)) {
        file_put_contents($dosya, $mesaj . PHP_EOL, FILE_APPEND);
        $mesaj = "Mesaj başarıyla kaydedildi!";
    } else {
        $mesaj = "Kaydedilecek bir mesaj yok.";
    }
}

// 2. Buton: Dosyayı temizle
if (isset($_POST['temizle'])) {
    file_put_contents($dosya, '');
    $mesaj = "Dosya içeriği temizlendi.";
}

// 3. Buton: Rastgele bir satır al
if (isset($_POST['rastgele'])) {
    if (file_exists($dosya) && filesize($dosya) > 0) {
        $icerik = file($dosya, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $rastgeleSatir = $icerik[array_rand($icerik)];
        $mesaj = "Rastgele satır: " . $rastgeleSatir;
    } else {
        $mesaj = "Dosya boş veya bulunamadı.";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosya İşlemleri</title>
    <style>
        body {
            background-color: #007BFF; /* Mavi arka plan */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            color: white; /* Yazı rengi beyaz */
        }
        .container {
            background-color: #0056b3; /* Daha koyu mavi kutu */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            width: 300px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            background-color: #ffcc00; /* Sarı buton */
            color: black;
            cursor: pointer;
        }
        button:hover {
            background-color: #ffc107; /* Daha açık sarı hover */
        }
        p {
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dosya İşlemleri</h1>
        <form method="post">
            <label for="mesaj">Mesaj:</label>
            <input type="text" name="mesaj" id="mesaj">
            <button type="submit" name="kaydet">1. Mesajı Kaydet</button>
            <button type="submit" name="temizle">2. Dosyayı Temizle</button>
            <button type="submit" name="rastgele">3. Rastgele Bir Satır Getir</button>
        </form>
        <p><strong><?php echo $mesaj; ?></strong></p>
    </div>
</body>
</html>

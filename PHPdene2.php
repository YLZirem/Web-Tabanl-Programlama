<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinamik Tablo Oluştur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
            background-color: #98FF98; /* Mint yeşili arka plan */
        }
        form {
            margin-bottom: 20px;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #333;
        }
        td {
            padding: 10px;
            text-align: center;
            background-color: #f0f8ff;
        }
    </style>
</head>
<body>
    <h1>Dinamik Tablo Oluşturucu</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $satir = intval($_POST['satir']);
        $sutun = intval($_POST['sutun']);
        
        if ($satir > 0 && $sutun > 0) {
            echo "<h2>{$satir} x {$sutun} Tablosu</h2>";
            echo "<table>";
            for ($i = 0; $i < $satir; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $sutun; $j++) {
                    $randomNumber = rand(1, 100);
                    echo "<td>{$randomNumber}</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Lütfen geçerli bir sayı girin.</p>";
        }
    }
    ?>
    <form method="post">
        <label for="satir">Satır Sayısı:</label>
        <input type="number" id="satir" name="satir" min="1" required>
        <br><br>
        <label for="sutun">Sütun Sayısı:</label>
        <input type="number" id="sutun" name="sutun" min="1" required>
        <br><br>
        <button type="submit">Tabloyu Oluştur</button>
    </form>
</body>
</html>

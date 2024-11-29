<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Formdan gelen değerleri al
    $rows = $_POST['rows'];
    $cols = $_POST['cols'];

    echo "<h2>Oluşturulan Tablo</h2>";
    echo "<table border='1' cellspacing='0' cellpadding='5'>";

    // Satırları oluştur
    for ($i = 0; $i < $rows; $i++) {
        echo "<tr>";

        // Her satırda sütunları oluştur
        for ($j = 0; $j < $cols; $j++) {
            // 1-100 arasında rastgele bir sayı üret
            $randomNumber = rand(1, 100);
            echo "<td>$randomNumber</td>";
        }

        echo "</tr>";
    }

    echo "</table>";
}
?>
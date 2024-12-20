<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anket_veritabani"; // phpMyAdmin'de oluşturduğunuz veritabanı adı

// Veritabanına bağlanma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
}

// Anket verilerini alma
$sql = "SELECT * FROM anket_sonuc";
$result = $conn->query($sql);

// CSV formatında çıktı oluşturma
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="anket_sonuc.csv"');
$output = fopen('php://output', 'w');
fputcsv($output, array('id', 'language', 'timestamp')); // Başlık satırı

while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row); // Her satır verisini yaz
}

fclose($output);
$conn->close();
?>

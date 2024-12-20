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

// Form verisini alıp veritabanına kaydetme
if (isset($_POST['language'])) {
    $selectedLanguage = $_POST['language'];

    // Veritabanına veri eklemek için hazırlık
    $stmt = $conn->prepare("INSERT INTO anket_sonuc (language) VALUES (?)");
    $stmt->bind_param("s", $selectedLanguage); // "s" string veri tipi
    $stmt->execute();
    $stmt->close();

    // Başarılı işlem sonrası kullanıcıyı sonuçlar sayfasına yönlendirme
    header('Location: sonuclar.php');
    exit;
}

$conn->close();
?>


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

// Anket sonuçlarını alma
$query = "SELECT language, COUNT(*) AS count FROM anket_sonuc GROUP BY language";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<h2>Anket Sonuçları</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row['language'] . ": " . $row['count'] . " oy</li>";
    }
    echo "</ul>";
} else {
    echo "Henüz oy kullanılmamış.";
}

$conn->close();
?>


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


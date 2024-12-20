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

<?php
// Veritabanı bağlantı bilgileri
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uyeol"; // Veritabanı adı

try {
    // MySQL bağlantısı
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Form verilerini al
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Formdan gelen değerler
        $kullaniciAdi = $_POST['username'];
        $eposta = $_POST['email'];
        $sifre = $_POST['password']; // Formdaki password verisi

        // Şifreyi hashle
        $hashedPassword = password_hash($sifre, PASSWORD_BCRYPT);

        // Veritabanına ekle
        $stmt = $conn->prepare("INSERT INTO kullanicilar (kullanici_adi, eposta, password) VALUES (:kullaniciAdi, :eposta, :hashedPassword)");
        $stmt->bindParam(':kullaniciAdi', $kullaniciAdi);
        $stmt->bindParam(':eposta', $eposta);
        $stmt->bindParam(':hashedPassword', $hashedPassword);

        $stmt->execute();
        echo "Kayıt başarılı!";
    }
} catch (PDOException $e) {
    echo "Hata: " . $e->getMessage();
}
?>

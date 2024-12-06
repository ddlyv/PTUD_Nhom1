<?php
$servername = "127.0.0.1"; // Thử thay bằng 127.0.0.1
$username = "root";
$password = "";
$dbname = "benhvien";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Thiết lập chế độ lỗi
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Kết nối thành công";
} catch (PDOException $e) {
    echo "Kết nối thất bại: " . $e->getMessage();
}
?>

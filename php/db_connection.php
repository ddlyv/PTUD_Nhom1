<?php
$host = 'localhost';  // Địa chỉ máy chủ MySQL
$username = 'root';   // Tên tài khoản MySQL
$password = '';       // Mật khẩu MySQL
$database = 'benhvien'; // Tên cơ sở dữ liệu

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>

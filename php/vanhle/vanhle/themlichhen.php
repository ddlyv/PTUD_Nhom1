<?php
// Kết nối với cơ sở dữ liệu
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $maLichHen = $_POST['maLichHen'];
    $ngayTaoLichHen = $_POST['ngayTaoLichHen'];
    $ngayDatLich = $_POST['ngayDatLich'];
    $gioDatLich = $_POST['gioDatLich'];
    $trangThai = $_POST['trangThai'];
    $maBenhNhan = $_POST['maBenhNhan'];
    $type = $_POST['Type'];
    $maBacSi = $_POST['maBacSi'];

    // Thực hiện câu lệnh SQL để thêm lịch hẹn
    $sql = "INSERT INTO lichhen (maLichHen, ngayTaoLichHen, ngayDatLich, gioDatLich, trangThai, maBenhNhan, Type, maBacSi)
            VALUES ('$maLichHen', '$ngayTaoLichHen', '$ngayDatLich', '$gioDatLich', '$trangThai', '$maBenhNhan', '$type', '$maBacSi')";

    if ($conn->query($sql) === TRUE) {
        // Nếu thành công, chuyển hướng về trang danh sách lịch hẹn
        header("Location: index.php");
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}
?>

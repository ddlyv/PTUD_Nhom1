<?php include 'config.php'; ?>
<?php
// Kết nối với cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "", "benhvien");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Nhận ID bác sĩ từ URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa bác sĩ
    $sql = "DELETE FROM bacsi WHERE maBacSi='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Xóa bác sĩ thành công!'); window.location.href = 'index.php';</script>";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

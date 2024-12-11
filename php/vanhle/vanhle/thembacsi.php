<?php include 'config.php'; ?>
<?php
// Kết nối với cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "", "benhvien");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Nhận dữ liệu từ form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hoTenDem = $_POST['hoTenDem'];
    $ten = $_POST['ten'];
    $ngaySinh = $_POST['ngaySinh'];
    $soDienThoai = $_POST['soDienThoai'];
    $gioiTinh = $_POST['gioiTinh'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];

    // Thêm bác sĩ vào bảng
    $sql = "INSERT INTO bacsi (hoTenDem, ten, ngaySinh, soDienThoai, gioiTinh, email, diachi)
            VALUES ('$hoTenDem', '$ten', '$ngaySinh', '$soDienThoai', '$gioiTinh', '$email', '$diachi')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Thêm bác sĩ thành công!'); window.location.href = 'index.php';</script>";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

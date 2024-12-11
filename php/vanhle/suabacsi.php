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
    $id = $_POST['id'];
    $hoTenDem = $_POST['hoTenDem'];
    $ten = $_POST['ten'];
    $ngaySinh = $_POST['ngaySinh'];
    $soDienThoai = $_POST['soDienThoai'];
    $gioiTinh = $_POST['gioiTinh'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];

    // Cập nhật thông tin bác sĩ
    $sql = "UPDATE bacsi SET hoTenDem='$hoTenDem', ten='$ten', ngaySinh='$ngaySinh',
            soDienThoai='$soDienThoai', gioiTinh='$gioiTinh', email='$email', diachi='$diachi'
            WHERE maBacSi='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cập nhật thông tin bác sĩ thành công!'); window.location.href = 'index.php';</script>";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

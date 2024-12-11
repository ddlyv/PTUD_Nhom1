<?php include 'db_connection.php'; ?>
<?php
// Kết nối với cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "", "benhvien");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Kiểm tra xem dữ liệu có được gửi qua POST hay không
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form và kiểm tra null
    $maBacSi = isset($_POST['maBacSi']) ? trim($_POST['maBacSi']) : '';
    $hoTenDem = isset($_POST['hoTenDem']) ? trim($_POST['hoTenDem']) : '';
    $ten = isset($_POST['ten']) ? trim($_POST['ten']) : '';
    $ngaySinh = isset($_POST['ngaySinh']) ? trim($_POST['ngaySinh']) : '';
    $soDienThoai = isset($_POST['soDienThoai']) ? trim($_POST['soDienThoai']) : '';
    $gioiTinh = isset($_POST['gioiTinh']) ? trim($_POST['gioiTinh']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $diachi = isset($_POST['diachi']) ? trim($_POST['diachi']) : '';
    $maTaiKhoan = isset($_POST['maTaiKhoan']) ? trim($_POST['maTaiKhoan']) : '';

    // Xử lý file ảnh đại diện
    $anhDaiDien = null;
    if (isset($_FILES['anhDaiDien']) && $_FILES['anhDaiDien']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES['anhDaiDien']['name']);
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Kiểm tra loại file hợp lệ
        $allowedTypes = ["jpg", "jpeg", "png", "gif"];
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['anhDaiDien']['tmp_name'], $targetFile)) {
                $anhDaiDien = $targetFile;
            } else {
                echo "<script>alert('Không thể tải lên ảnh đại diện!'); window.history.back();</script>";
                exit();
            }
        } else {
            echo "<script>alert('Chỉ cho phép các định dạng JPG, JPEG, PNG, GIF!'); window.history.back();</script>";
            exit();
        }
    }

    // Kiểm tra mã bác sĩ có rỗng không
    if (empty($maBacSi)) {
        echo "<script>alert('Mã bác sĩ không được để trống!'); window.history.back();</script>";
        exit();
    }

    // Chuẩn bị câu lệnh SQL để chèn dữ liệu
    $sql = "INSERT INTO bacsi (maBacSi, hoTenDem, ten, ngaySinh, soDienThoai, gioiTinh, email, diachi, anhDaiDien, maTaiKhoan) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

    // Sử dụng prepared statement để bảo mật
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssssssssss", $maBacSi, $hoTenDem, $ten, $ngaySinh, $soDienThoai, $gioiTinh, $email, $diachi, $anhDaiDien, $maTaiKhoan);

        if ($stmt->execute()) {
            echo "<script>alert('Thêm bác sĩ thành công!'); window.location.href='index.php';</script>";
        } else {
            echo "Lỗi: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Lỗi chuẩn bị truy vấn: " . $conn->error;
    }
} else {
    echo "<script>alert('Phương thức không hợp lệ!'); window.history.back();</script>";
}

$conn->close();
?>

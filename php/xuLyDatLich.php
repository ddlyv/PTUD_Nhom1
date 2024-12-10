<?php
// Kết nối cơ sở dữ liệu
include '../myclass/clsbenhvien.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $diaDiem = $_POST['diaDiem'];
    $loaiDichVu = $_POST['loaiDichVu'];
    $chuyenKhoa = $_POST['chuyenKhoa'];
    $bacSi = $_POST['bacSi'];
    $ngayKham = $_POST['ngayKham'];
    $khungGio = $_POST['khungGio']; // Khung giờ khám
    $ghiChu = $_POST['ghiChu'];

    // Ràng buộc mã tài khoản bệnh nhân (lấy từ session khi bệnh nhân đã đăng nhập)
    session_start();
    if (isset($_SESSION['maBenhNhan'])) {
        $maBenhNhan = $_SESSION['maBenhNhan'];
    } else {
        echo "Vui lòng đăng nhập để đặt lịch hẹn.";
        exit;
    }

    // Lấy mã bác sĩ dựa trên tên bác sĩ đã chọn
    $query_bacSi = "SELECT maBacSi FROM bacSi WHERE tenBacSi = ?";
    $stmt_bacSi = $conn->prepare($query_bacSi);
    $stmt_bacSi->bind_param('s', $bacSi);
    $stmt_bacSi->execute();
    $result_bacSi = $stmt_bacSi->get_result();

    if ($result_bacSi->num_rows > 0) {
        $row = $result_bacSi->fetch_assoc();
        $maBacSi = $row['maBacSi'];
    } else {
        echo "Không tìm thấy bác sĩ đã chọn.";
        exit;
    }
    $stmt_bacSi->close();

    // Thêm lịch hẹn vào bảng
    $query = "INSERT INTO lichHen (maBenhNhan, ngayTaoLichHen, ngayDatLich, khungGio, diaDiem, loaiDichVu, chuyenKhoa, trangThai, maBacSi, ghiChu, Type)
              VALUES (?, CURDATE(), ?, ?, ?, ?, ?, 'Chờ xác nhận', ?, ?, ?)";
    $stmt = $conn->prepare($query);

    // Type mặc định là "TK" (tùy chỉnh nếu cần)
    $type = 'TK';
    $stmt->bind_param('issssssis', $maBenhNhan, $ngayKham, $khungGio, $diaDiem, $loaiDichVu, $chuyenKhoa, $maBacSi, $ghiChu, $type);

    if ($stmt->execute()) {
        echo "Đặt lịch thành công! Lịch hẹn đã được lưu.";
    } else {
        // Sử dụng errorInfo() để lấy thông tin lỗi chi tiết
        $errorInfo = $stmt->errorInfo();
        echo "Có lỗi xảy ra: " . $errorInfo[2]; // $errorInfo[2] chứa thông báo lỗi chi tiết
    }
    

    $stmt->close();
    $conn->close();
} else {
    echo "Yêu cầu không hợp lệ.";
}
?>


<?php

    session_start();




// Cấu hình quyền truy cập cho các vai trò
$permissions = [
'Bác sĩ' => [ 
    'danhChoBacSi.php',
    'xemThongTinBenhNhan.php',
    'xemLichLam.php',
    'phieuXetNghiem.php',
    'themPhieuXetNghiem.php',
    'suaPhieuXetNghiem.php',
    'HoSoBenhAn.php',
    'phieuXetNghiemTheoHoSo.php',
    'CapNhatHoSoBenhAn.php',
    'DanhSachDonThuocTheoHoSo.php',
    'HienThiDonThuoc.php',
    'KhamBenh.php',
    'TaoHoSoBenhAn.php',
    'ThemDonThuoc.php',
    'ThemDonThuocThanhCong.php',
    'XemLichTaiKham.php',
'addLichTaiKham.php',
'ThemLichLam.php'],
    'Bệnh nhân' => [ 'danhChoBenhNhan.php','benhNhanXemDonThuoc.php','datLichKham.php','chinhSuaThongTin.php','hoSoBenhAn.php','lichHenKham.php'],
    'Quản lý' => ['danhChoQuanLy.php','loaiXetNghiem.php','themLoaiXetNghiem.php','suaLoaiXetNghiem.php','lock_bac_si.php','lock_benh_nhan.php','quan_li_lich_hen_kham.php','quan_li_lich_kham.php','quan_li_tai_khoan_bac_si.php','quan_li_tai_khoan_benh_nhan.php','route.php'],  
];

// Hàm kiểm tra quyền truy cập
function checkAccess()
{
    global $permissions;

    // Lấy vai trò người dùng từ session
    $userRole = isset($_SESSION['vaiTro']) ? $_SESSION['vaiTro'] : null;

    // Lấy tên file hiện tại
    $currentPage = basename($_SERVER['PHP_SELF']);

    // Kiểm tra quyền truy cập
    if (!$userRole || !isset($permissions[$userRole]) || !in_array($currentPage, $permissions[$userRole])) {
        // Nếu không có quyền, chuyển hướng đến trang lỗi
        //header('Location: tuChoiPhanQuyen.php');
        echo"<script>
            alert('Bạn không có quyền truy cập !!!');
            window.location='../';
        </script>";
        exit();
    }
}

// Gọi hàm kiểm tra quyền
checkAccess();
?>






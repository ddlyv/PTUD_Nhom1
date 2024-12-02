
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



// Cấu hình quyền truy cập cho các vai trò
$permissions = [
    'Bác sĩ' => ['index.php', 'danhChoBacSi.php','xemThongTinBenhNhan.php'],
    'Bệnh nhân' => ['index.php', 'danhChoBenhNhan.php'],
    'Quản lý' => ['../HaiPhong/index.php','danhChoQuanLy.php'],  
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
        header('Location: tuChoiPhanQuyen.php');
        exit();
    }
}

// Gọi hàm kiểm tra quyền
checkAccess();
?>

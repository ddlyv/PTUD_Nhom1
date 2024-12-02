<?php
session_start();

// Cấu hình quyền truy cập
$permissions = [
    'Bác sĩ' => ['index.php', 'danhChoBacSi.php'],
    'Bệnh Nhân' => ['index.php', 'danhChoBenhNhan.php'],
    'Quản lý' => ['index.php', 'danhChoQuanly.php'],
];

// Hàm kiểm tra quyền
function checkAccess()
{
    global $permissions;

    // Lấy vai trò hiện tại từ session
    $userRole = isset($_SESSION['vaiTro']) ? $_SESSION['vaiTro'] : null;

    // Lấy tên file hiện tại
    $currentPage = basename($_SERVER['PHP_SELF']);

    // Kiểm tra vai trò và quyền
    if (!$userRole || !isset($permissions[$userRole]) || !in_array($currentPage, $permissions[$userRole])) {
        // Nếu không có quyền, chuyển đến trang lỗi
        header('Location: myclass/clstuchoi.php');
        exit();
    }
}


// Gọi hàm kiểm tra (không cần truyền tham số)
checkAccess();
?>

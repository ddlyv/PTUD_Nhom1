    <?php
    require_once '../myclass/clsdonthuoc.php';
    session_start();

    // Check if the user is a doctor
    if (!isset($_SESSION['vaiTro']) || $_SESSION['vaiTro'] !== 'Bác sĩ') {
        die("Bạn không có quyền truy cập vào trang này.");
    }

    // Get data from the form
    $hoSoId = $_POST['hoSoId'] ?? null;
    $ngayKeDon = $_POST['ngayKeDon'] ?? null;
    $ngayTaiKham = $_POST['ngayTaiKham'] ?? null;
    $ghiChu = $_POST['ghiChu'] ?? null;
    $medicine = $_POST['medicine'] ?? [];
    $usage = $_POST['usage'] ?? [];
    $quantity = $_POST['quantity'] ?? [];

    // Validate form inputs
    if (!$hoSoId || !$ngayKeDon || empty($medicine) || empty($usage) || empty($quantity)) {
        die("Thông tin không đầy đủ. Vui lòng kiểm tra lại.");
    }

    // Print data for debugging (if needed)
    // Uncomment the below lines to check the received data

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // die();


    $donThuoc = new Clsdonthuoc();

    $sqlInsertDonThuoc = "
        INSERT INTO donthuoc (ngayKeDon, ngayTaiKham, maHoSo, ghiChu)
        VALUES ('$ngayKeDon', " . ($ngayTaiKham ? "'$ngayTaiKham'" : "NULL") . ", $hoSoId, '$ghiChu')
    ";
    if (!$donThuoc->themxoasua($sqlInsertDonThuoc)) {
        die("Lỗi khi thêm đơn thuốc.");
    }

    // Get the ID of the newly inserted prescription
    $maDonThuoc = $donThuoc->laycot("SELECT LAST_INSERT_ID()");

    // Insert prescription details
    foreach ($medicine as $index => $maThuoc) {
        $cachDung = $usage[$index] ?? '';
        $soLuong = $quantity[$index] ?? 0;

        // Ensure all fields are filled correctly
        if (!$maThuoc || !$cachDung || $soLuong <= 0) {
            die("Thông tin chi tiết đơn thuốc tại index $index không hợp lệ. Vui lòng kiểm tra lại.");
        }

        $sqlInsertChiTiet = "
            INSERT INTO chitietdonthuoc (maDonThuoc, maThuoc, cachDung, soLuong)
            VALUES ($maDonThuoc, $maThuoc, '$cachDung', $soLuong)
        ";
        if (!$donThuoc->themxoasua($sqlInsertChiTiet)) {
            die("Lỗi khi thêm chi tiết đơn thuốc tại index $index.");
        }
    }

    echo '<script>alert("Thêm đơn thuốc thành công!"); window.location.href="ThemDonThuocThanhCong.php";</script>';
?>
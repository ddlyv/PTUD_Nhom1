<?php
include '../layout/header.php';
include 'phanQuyen.php';

require_once '../myclass/Clsdonthuoc.php';
require_once '../myclass/clsHoSoBenhAn.php';
require_once '../myclass/clsBacSi.php';

session_start();

// if (!isset($_SESSION['vaiTro']) || $_SESSION['vaiTro'] !== 'Bác sĩ') {
//     die("Bạn không có quyền truy cập vào trang này.");
// }

$taikhoanId = $_SESSION['id'];
$bacsi = new ClsBacSi();
$sqlGetMaBacSi = "SELECT maBacSi FROM BacSi WHERE maTaiKhoan = $taikhoanId";

$maBacSi = $bacsi->laycot($sqlGetMaBacSi);

$hoSo = new clsHoSoBenhAn();
$dsHoSo = $hoSo->layDanhSachHoSo($maBacSi);
?>

<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<style>
    .table thead {
        background-color: #d3d3d3;
    }

    .action-links a {
        margin-right: 10px;
        text-decoration: none;
    }

    .action-links a:hover {
        text-decoration: underline;
    }
</style>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Danh Sách Hồ Sơ Bệnh Án</h3>
    </div>

    <table class="table table-bordered mt-3">
        <thead class="thead-light">
            <tr>
                <th>Ngày Tạo</th>
                <th>Mã Bệnh Nhân</th>
                <th>Họ Tên Bệnh Nhân</th>
                <th>Năm Sinh</th>
                <th>Giới Tính</th>
                <th>Chuẩn Đoán</th>
                <th>Trạng Thái</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($dsHoSo)) : ?>
                <?php foreach ($dsHoSo as $hoSo) : ?>
                    <tr>
                        <td><?= htmlspecialchars($hoSo['ngayTaoHoSo']) ?></td>
                        <td><?= htmlspecialchars($hoSo['maBenhNhan']) ?></td>
                        <td><?= htmlspecialchars($hoSo['hoTenDem'] . ' ' . $hoSo['ten']) ?></td>
                        <td><?= htmlspecialchars($hoSo['namSinh']) ?></td>
                        <td><?= htmlspecialchars($hoSo['gioiTinh']) ?></td>
                        <td><?= htmlspecialchars($hoSo['chuanDoan']) ?></td>
                        <td>
                            <?php if ($hoSo['trangThai'] === 'Đang chờ') : ?>
                                <button type="button" class="btn btn-warning">Đang chờ</button>
                            <?php elseif ($hoSo['trangThai'] === 'Hoàn Thành') : ?>
                                <button type="button" class="btn btn-success">Hoàn thành</button>
                            <?php else : ?>
                                <button type="button" class="btn btn-danger">Hủy</button>
                            <?php endif; ?>
                        </td>
                        <td class="action-links">
                            <?php if ($hoSo['trangThai'] === 'Đang chờ') : ?>
                                <a href="ThemDonThuoc.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Thêm Đơn Thuốc</a><br>
                                <a href="../MinhCong/themPhieuXetNghiem.php?id=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Thêm Xét Nghiệm</a><br>
                                <a href="CapNhatHoSoBenhAn.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Cập Nhật Hồ Sơ</a><br>
                                <a href="DanhSachDonThuocTheoHoSo.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Xem Danh Sách Đơn Thuốc</a><br>
                                <a href="phieuXetNghiemTheoHoSo.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Xem Danh Sách Xét Nghiệm</a><br>
                                <?php elseif ($hoSo['trangThai'] === 'Hoàn Thành') : ?>
                                <a href="DanhSachDonThuocTheoHoSo.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Xem Danh Sách Đơn Thuốc</a><br>
                                <a href="phieuXetNghiemTheoHoSo.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Xem Danh Sách Xét Nghiệm</a><br>

                            <?php else : ?>
                                <a href="DanhSachDonThuocTheoHoSo.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Xem Danh Sách Đơn Thuốc</a><br>
                                <a href="phieuXetNghiemTheoHoSo.php?hoSoId=<?= htmlspecialchars($hoSo['maHoSo']) ?>">Xem Danh Sách Xét Nghiệm</a><br>
                                <?php endif; ?>
                            
                        </td>
                    </tr>
                <?php endforeach; ?>    
            <?php else : ?>
                <tr>
                    <td colspan="8" class="text-center">Không có hồ sơ bệnh án nào.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
<?php include '../layout/footer.php'; ?>

<?php 

include '../layout/header.php'; 
require_once '../myclass/clslichtaikham.php';
require_once '../myclass/clsbacsi.php';

session_start();

if (!isset($_SESSION['vaiTro']) || $_SESSION['vaiTro'] !== 'Bác sĩ') {
    die("Bạn không có quyền truy cập vào trang này.");
}

$taikhoanId = $_SESSION['id'];
$bacsi = new ClsBacSi();
$maBacSi = $bacsi->laycot("SELECT maBacSi FROM BacSi WHERE maTaiKhoan = $taikhoanId");
$lichTaiKham = new ClsLichTaiKham();
$limit = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $limit;
$pageCount = ceil($lichTaiKham->layTongSoLichTaiKham($maBacSi) / $limit);
$dsLichTaiKham = $lichTaiKham->layDanhSachLichTaiKham($maBacSi, $offset, $limit);

?>

    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <style>
        .status-btn {
            border: none;
            border-radius: 50px;
            padding: 5px 15px;
            font-size: 0.9rem;
            color: white;
            width: 150px;
        }

        .status-checked {
            background-color: #6c757d;
        }

        .status-unchecked {
            background-color: #dc3545;
        }

        .table {
            width: 100%;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }
        .action-links a {
            margin-right: 10px;
            text-decoration: none;
        }
        .action-links a:hover {
            text-decoration: underline;
        }
        .search-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 15px;
        }

        .pagination .page-item .page-link {
            background-color: #f8f9fa; 
            color: #007bff;
            border: 1px solid #dee2e6;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            color: white;
            border-color: #007bff; 
        }

        .pagination .page-item .page-link:hover {
            background-color: #e9ecef;
            color: #0056b3;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            background-color: #f8f9fa;
        }
    </style>


    <div class="container mt-5">
        <h2 class="mb-4">Danh Sách Lịch Tái Khám</h2>

        <div class="d-flex justify-content-end mb-3">
            <input type="text" class="form-control me-2" placeholder="Nhập từ khóa" style="width: 200px;">
            <button class="btn btn-primary">Tìm kiếm</button>
        </div>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th scope="col">Mã lịch tái khám </th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Ngày sinh</th>
                    <th scope="col">Giới tính</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Bác sĩ</th>
                    <th scope="col">Ngày khám</th>
                    <th scope="col">Thời gian</th>
                    <th scope="col">Trạng Thái</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dsLichTaiKham as $lichTaiKham) : ?>
                    <tr>
                        <td><?= $lichTaiKham['maLichHen'] ?></td>
                        <td><?= $lichTaiKham['hoTenBenhNhan'] ?></td>
                        <td><?= $lichTaiKham['ngaySinh'] ?></td>
                        <td><?= $lichTaiKham['gioiTinh'] ?></td>
                        <td><?= $lichTaiKham['soDienThoai'] ?></td>
                        <td><?= $lichTaiKham['hoTenBacSi'] ?></td>
                        <td><?= $lichTaiKham['ngayDatLich'] ?></td>
                        <td><?= $lichTaiKham['gioDatLich'] ?></td>
                        <td>  
                            <?php if ($lichTaiKham['trangThai'] === 'Đang chờ') : ?>
                                <button type="button" class="btn btn-warning">Đang chờ</button>
                            <?php elseif ($lichTaiKham['trangThai'] === 'Hoàn thành') : ?>
                                <button type="button" class="btn btn-success">Hoàn thành</button>
                            <?php else : ?>
                                <button type="button" class="btn btn-danger">Hủy</button>
                            <?php endif; ?>  
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
<?php include '../layout/footer.php'; ?>
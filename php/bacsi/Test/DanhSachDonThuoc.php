<?php
// include '../layout/header.php';
// require_once '../myclass/clsdonthuoc.php';
// require_once '../myclass/clsbacsi.php';

// session_start();

// if (!isset($_SESSION['vaiTro']) || $_SESSION['vaiTro'] !== 'Bác sĩ') {
//     die("Bạn không có quyền truy cập vào trang này.");
// }

// $taikhoanId = $_SESSION['id'];

// $bacsi = new Clsbacsi();
// $sqlGetMaBacSi = "SELECT maBacSi FROM BacSi WHERE maTaiKhoan = $taikhoanId";
// $maBacSi = $bacsi->laycot($sqlGetMaBacSi);

// if (!$maBacSi) {
//     die("Không tìm thấy thông tin bác sĩ.");
// }

// $donThuoc = new Clsdonthuoc();
// $limit = 5; 
// $page = isset($_GET['page']) ? intval($_GET['page']) : 1; 
// $offset = ($page - 1) * $limit;

// $totalRecords = $donThuoc->laycot("
//     SELECT COUNT(*) 
//     FROM DonThuoc 
//     INNER JOIN HoSoBenhAn ON DonThuoc.maHoSo = HoSoBenhAn.maHoSo
//     WHERE HoSoBenhAn.maBacSi = $maBacSi
// ");
// $totalPages = ceil($totalRecords / $limit);

// $sql = "
//     SELECT 
//         DonThuoc.maDonThuoc, 
//         DonThuoc.ngayKeDon, 
//         CONCAT(BacSi.hoTenDem, ' ', BacSi.ten) AS tenBacSi, 
//         CONCAT(BenhNhan.hoTenDem, ' ', BenhNhan.ten) AS tenBenhNhan
//     FROM 
//         DonThuoc
//     INNER JOIN HoSoBenhAn ON DonThuoc.maHoSo = HoSoBenhAn.maHoSo
//     INNER JOIN BacSi ON HoSoBenhAn.maBacSi = BacSi.maBacSi
//     INNER JOIN BenhNhan ON HoSoBenhAn.maBenhNhan = BenhNhan.maBenhNhan
//     WHERE HoSoBenhAn.maBacSi = $maBacSi
//     LIMIT $offset, $limit";
// $donThuocData = $donThuoc->laydulieu($sql);
?>
<!-- 
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 30px;
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



    <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Danh Sách Đơn Thuốc</h3>
        <button class="btn btn-success" onclick="window.location.href='ThemDonThuoc.php'">Tạo Mới</button>
    </div>

    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Mã đơn thuốc</th>
                <th>Ngày</th>
                <th>Bác sĩ</th>
                <th>Bệnh nhân</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($donThuocData)) : ?>
                <?php foreach ($donThuocData as $don) : ?>
                    <tr>
                        <td><?= htmlspecialchars($don['maDonThuoc']) ?></td>
                        <td><?= htmlspecialchars($don['ngayKeDon']) ?></td>
                        <td><?= htmlspecialchars($don['tenBacSi']) ?></td>
                        <td><?= htmlspecialchars($don['tenBenhNhan']) ?></td>
                        <td class="action-links">
                            <a href="HienThiDonThuoc.php?id=<?= htmlspecialchars($don['maDonThuoc']) ?>">Xem</a> |
                            <a href="SuaDonThuoc.php?id=<?= htmlspecialchars($don['maDonThuoc']) ?>">Sửa</a> |
                            <a href="javascript:void(0)" onclick="deleteDonThuoc(<?= htmlspecialchars($don['maDonThuoc']) ?>)">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5" class="text-center">Không có dữ liệu.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <nav aria-label="Page navigation" class="pagination-container">
        <ul class="pagination justify-content-center">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>


<script>
    function deleteDonThuoc(maDonThuoc) {
        const isConfirmed = confirm("Bạn có muốn xóa đơn thuốc này không?");
        if (isConfirmed) {
            fetch('../xuLy/XoaDonThuoc.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ maDonThuoc }),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Xóa thành công!");
                        reloadDonThuocList();
                    } else {
                        alert("Không thể xóa đơn thuốc.");
                    }
                })
                .catch(error => {
                    console.error('Lỗi:', error);
                    alert("Đã xảy ra lỗi khi xóa đơn thuốc.");
                });
        }
    }

    function reloadDonThuocList() {
        window.location.reload();
    }
</script> -->


<?php 
// include '../layout/footer.php'; 
?> 


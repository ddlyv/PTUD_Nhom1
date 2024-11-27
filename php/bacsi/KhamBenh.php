<?php 

    include '../layout/header.php'; 
    require_once '../myclass/clsBacSi.php';
    require_once '../myclass/clslichkham.php';
        
    session_start();

    if (!isset($_SESSION['vaiTro']) || $_SESSION['vaiTro'] !== 'Bác sĩ') {
        die("Bạn không có quyền truy cập vào trang này.");
    }

    $taikhoanId = $_SESSION['id'];
    $bacsi = new ClsBacSi();
    $sqlGetMaBacSi = "SELECT maBacSi FROM BacSi WHERE maTaiKhoan = $taikhoanId";

    $maBacSi = $bacsi->laycot($sqlGetMaBacSi);
    $lichkham = new Clslichkham();
    $limit = 5;
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $offset = ($page - 1) * $limit;
    $pageCount = ceil($lichkham->layTongSoLichKham($maBacSi) / $limit);
    $dsLichKham = $lichkham->layDanhSachLichKham($maBacSi, $offset, $limit);
    
?>

    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

    <style>
        .table thead {
            background-color: #d3d3d3;
        }

        .search-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 15px;
        }
    </style>


    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Danh Sách Khám Bệnh</h3>
        </div>


        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Họ tên bệnh nhân</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Bác sĩ</th>
                    <th scope="col">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dsLichKham as $lichKham) : ?>
                    <tr>
                        <td><?= $lichKham['maLichKham'] ?></td>
                        <td><?= $lichKham['hoTenBenhNhan'] ?></td>
                        <td><?= $lichKham['soDienThoai'] ?></td>
                        <td><?= $lichKham['hoTenBacSi'] ?></td>
                        <td>
                            <a href="TaoHoSoBenhAn.php?maLichKham=<?= $lichKham['maLichKham'] ?>">Tạo hồ sơ bệnh án</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
<?php include '../layout/footer.php'; ?>
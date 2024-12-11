<?php include 'header.php'; ?>
<?php
include 'db_connection.php';

// Lấy danh sách bệnh nhân từ cơ sở dữ liệu
$sql = "SELECT * FROM benhnhan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Bệnh Nhân</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table {
            margin-top: 20px;
        }
        .btn-custom {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Danh Sách Bệnh Nhân</h2>

    <!-- Nút Thêm Bệnh Nhân -->
    <a href="thembenhnhan.php" class="btn btn-success mb-3">Thêm Bệnh Nhân</a>

    <!-- Hiển thị danh sách bệnh nhân -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Họ và Tên Đệm</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Địa Chỉ</th>
                <th>Số Điện Thoại</th>
                <th>Ngày Sinh</th>
                <th>Giới Tính</th>
                <th>Ảnh Đại Diện</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0) {
                // Hiển thị các bệnh nhân
                $stt = 1;
                while($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $stt++; ?></td>
                        <td><?php echo $row['hoTenDem']; ?></td>
                        <td><?php echo $row['ten']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['diaChi']; ?></td>
                        <td><?php echo $row['soDienThoai']; ?></td>
                        <td><?php echo $row['ngaySinh']; ?></td>
                        <td><?php echo $row['gioiTinh']; ?></td>
                        <td><img src="path/to/images/<?php echo $row['anhDaiDien']; ?>" alt="Ảnh đại diện" width="50"></td>
                        <td>
                            <!-- Liên kết Sửa Bệnh Nhân -->
                            <a href="suabenhnhan.php?id=<?php echo $row['maBenhNhan']; ?>" class="btn btn-warning btn-custom">Sửa</a>
                            
                            <!-- Liên kết Xóa Bệnh Nhân -->
                            <a href="xoabenhnhan.php?id=<?php echo $row['maBenhNhan']; ?>" class="btn btn-danger btn-custom" onclick="return confirm('Bạn chắc chắn muốn xóa bệnh nhân này?')">Xóa</a>
                        </td>
                    </tr>
            <?php }} else {
                echo "<tr><td colspan='10' class='text-center'>Không có dữ liệu bệnh nhân.</td></tr>";
            } ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS và jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php $conn->close(); ?>
<?php include 'footer.php'; ?>
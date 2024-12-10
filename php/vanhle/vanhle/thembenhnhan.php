<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $hoTenDem = $_POST['hoTenDem'];
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $diaChi = $_POST['diaChi'];
    $soDienThoai = $_POST['soDienThoai'];
    $ngaySinh = $_POST['ngaySinh'];
    $gioiTinh = $_POST['gioiTinh'];
    $anhDaiDien = $_FILES['anhDaiDien']['name'];

    if ($_FILES['anhDaiDien']['error'] == 0) {
        move_uploaded_file($_FILES['anhDaiDien']['tmp_name'], 'uploads/' . $anhDaiDien);
    }

    $sql = "UPDATE benhnhan SET hoTenDem='$hoTenDem', ten='$ten', email='$email', diaChi='$diaChi', soDienThoai='$soDienThoai', 
            ngaySinh='$ngaySinh', gioiTinh='$gioiTinh', anhDaiDien='$anhDaiDien' WHERE maBenhNhan='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");  // Quay lại trang danh sách bệnh nhân
        exit;
    } else {
        echo "Lỗi khi thêm: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Bệnh Nhân</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-container {
            margin-top: 50px;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
        }
        .message {
            margin-top: 20px;
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>

<div class="container form-container">
    <h2 class="text-center">Thêm Bệnh Nhân Mới</h2>

    <!-- Hiển thị thông báo -->
    <?php if (isset($message)) { ?>
        <div class="message"><?php echo $message; ?></div>
    <?php } ?>

    <!-- Form nhập thông tin bệnh nhân -->
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="hoTenDem">Họ và Tên Đệm</label>
            <input type="text" class="form-control" id="hoTenDem" name="hoTenDem" required>
        </div>
        <div class="form-group">
            <label for="ten">Tên</label>
            <input type="text" class="form-control" id="ten" name="ten" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="diaChi">Địa Chỉ</label>
            <input type="text" class="form-control" id="diaChi" name="diaChi" required>
        </div>
        <div class="form-group">
            <label for="soDienThoai">Số Điện Thoại</label>
            <input type="text" class="form-control" id="soDienThoai" name="soDienThoai" required>
        </div>
        <div class="form-group">
            <label for="ngaySinh">Ngày Sinh</label>
            <input type="date" class="form-control" id="ngaySinh" name="ngaySinh" required>
        </div>
        <div class="form-group">
            <label for="gioiTinh">Giới Tính</label>
            <select class="form-control" id="gioiTinh" name="gioiTinh" required>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
        </div>
        <div class="form-group">
            <label for="anhDaiDien">Ảnh Đại Diện</label>
            <input type="file" class="form-control" id="anhDaiDien" name="anhDaiDien" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Thêm Bệnh Nhân</button>
    </form>

    <br>
    <a href="hienthidanhsachbenhnhan.php" class="btn btn-secondary">Trở lại danh sách bệnh nhân</a>
</div>

<!-- Bootstrap JS và jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
$conn->close();  // Đóng kết nối cơ sở dữ liệu
?>
